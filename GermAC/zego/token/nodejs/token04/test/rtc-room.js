/**
 * 权限认证 token 生成示例
 */
const { generateToken04 } = require('../server/zegoServerAssistant');

// 请将 appID 修改为你的 appId，appid 为 数字
// 举例：1234567890
const appID = ; // type: number

// 请将 serverSecret 修改为你的 serverSecret，serverSecret 为 string
// 举例：'sdfsdfsd323sdfsdf'
const serverSecret = ;// type: 32 byte length string

// 请将 userId 修改为用户的 user_id
const userId = 'user1';// type: string

const effectiveTimeInSeconds = 3600; //type: number; unit: s； token 过期时间，单位：秒
const payloadObject = {
    room_id: 'demo',
    privilege: {
        1: 1,   // loginRoom: 1 pass , 0 not pass
        2: 0    // publishStream: 1 pass , 0 not pass
    },
    stream_id_list: null
}; // 
const payload = JSON.stringify(payloadObject);
// Build token 
const token =  generateToken04(appID, userId, serverSecret, effectiveTimeInSeconds, payload);
console.log('token:',token);