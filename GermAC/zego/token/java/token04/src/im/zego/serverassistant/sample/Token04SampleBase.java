package im.zego.serverassistant.sample;

import java.nio.ByteBuffer;
import java.nio.ByteOrder;
import java.util.Base64;

import javax.crypto.Cipher;
import javax.crypto.spec.IvParameterSpec;
import javax.crypto.spec.SecretKeySpec;

import im.zego.serverassistant.utils.TokenServerAssistant;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

//
// 基础鉴权 token 生成示例
//

public class Token04Sample {
    public static void main(String[] args) {
        long appId = 1222222222L;    // 请替换为你的 appId，从即构控制台获取
        String serverSecret = "12345678900987654321123456789012";  // 请替换为你的 serverSecret，从即构控制台获取，
        String userId = "test_user";    // 请替换为用户的 userID，同一 appId 下全网唯一
        int effectiveTimeInSeconds = 300;   // 有效时间，单位：秒
        // // 基础鉴权 token，payload字段可传空
        String payload = "{\"payload\":\"payload\"}";  // 填入自定义的payload值，如示例payload字段。 非必输，不传则赋值null。
        TokenServerAssistant.VERBOSE = false;    // 调试时，置为 true, 可在控制台输出更多信息；正式运行时，最好置为 false
        TokenServerAssistant.TokenInfo token = TokenServerAssistant.generateToken04(appId,  userId, serverSecret, effectiveTimeInSeconds, payload);
        System.out.println(token);

        if (token.error == null || token.error.code == TokenServerAssistant.ErrorCode.SUCCESS) {
            System.out.println("\r\ndecrypt the token ...");
            decryptToken(token.data, serverSecret);
        }
    }

    static private void decryptToken(String token, String secretKey) {
        String noVersionToken = token.substring(2);

        byte[] tokenBytes = Base64.getDecoder().decode(noVersionToken.getBytes());
        ByteBuffer buffer = ByteBuffer.wrap(tokenBytes);
        buffer.order(ByteOrder.BIG_ENDIAN);
        long expiredTime = buffer.getLong();
        System.out.println("expiredTime: " + expiredTime);
        int IVLength = buffer.getShort();
        byte[] ivBytes = new byte[IVLength];
        buffer.get(ivBytes);
        int contentLength = buffer.getShort();
        byte[] contentBytes = new byte[contentLength];
        buffer.get(contentBytes);

        try {
            SecretKeySpec key = new SecretKeySpec(secretKey.getBytes(), "AES");
            IvParameterSpec iv = new IvParameterSpec(ivBytes);

            Cipher cipher = Cipher.getInstance("AES/CBC/PKCS5Padding");
            cipher.init(Cipher.DECRYPT_MODE, key, iv);

            byte[] rawBytes = cipher.doFinal(contentBytes);
            JSONParser parser = new JSONParser();
            JSONObject json = (JSONObject)parser.parse(new String(rawBytes));
            System.out.println(json);
        } catch (Exception e) {
            System.out.println("decrypt failed: " + e);
        }
    }

}
