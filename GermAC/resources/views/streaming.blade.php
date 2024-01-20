<html>

<head>
    <style>
        #root {
            width: 100vw;
            height: 100vh;
        }
    </style>
</head>


<body>
    <div id="root"></div>
</body>
<script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>
<script>

    function getUrlParams(url) {
        let urlStr = url.split('?')[1];
        const urlSearchParams = new URLSearchParams(urlStr);
        const result = Object.fromEntries(urlSearchParams.entries());
        return result;
    }


    // Generate a Kit Token by calling a method.
    // @param 1: appID
    // @param 2: serverSecret
    // @param 3: Room ID
    // @param 4: User ID
    // @param 5: Username
    const roomID ='320244689' ;
    const userID = Math.floor(Math.random() * 10000) + "main";
    const userName = "userName" + userID;
    const appID = 320244689;
    const serverSecret = "2e9da9e8b5c7b124a4dab1cb817abab1";
    const kitToken =  ZegoUIKitPrebuilt.generateKitTokenForTest(appID, serverSecret, roomID, userID, userName);


    // You can assign different roles based on url parameters.
    let role = getUrlParams(window.location.href)['role'] || 'Host';
    role = role === 'Host' ? ZegoUIKitPrebuilt.Host : ZegoUIKitPrebuilt.Audience;


    const zp = ZegoUIKitPrebuilt.create(kitToken);
    zp.joinRoom({
        container: document.querySelector("#root"),
        scenario: {
            mode: ZegoUIKitPrebuilt.LiveStreaming,
            config: {
                role,
            },
        },
        sharedLinks: [{
            name: 'Join as audience',
            url:
               window.location.protocol + '//' +
               window.location.host + window.location.pathname +
                '?roomID=' +
                roomID +
                '&role=Audience',
        }]
    });
    //... your own logic code
fetch(
      `${youServerUrl}?userID=${userID}&expired_ts=86400`,
      {
        method: "GET",
      }
    )
.then((res) => res.json())
.then(({token})=>{
  const kitToken = ZegoUIKitPrebuilt.generateKitTokenForProduction(
     appID,
     token,
     roomID,
     userID,
     userName
  );
 const zp = ZegoUIKitPrebuilt.create(kitToken);
 //... to joinRoom
})
</script>

</html>
