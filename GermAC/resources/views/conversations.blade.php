<style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Asap', sans-serif;
    }

    .phoneswrapper {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      padding: 20px;
      height: 100vh;
    }

    .phone {
      height: 600px;
      width: 800px;
      padding: 10px 20px;
      border-radius: 32px;
      border: 8px solid #3e3e3e;
      overflow: hidden;
      position: relative;
      box-shadow: 0px 17px 20px rgba(0, 0, 0, 0.15);
    }

    .phone_head {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      height: 45px;
    }

    .phone_head .title {
      font-size: 24px;
      font-weight: 500;
      color: #34394F;
    }

    .icon_bubble.msg {
      width: 30px;
      height: 30px;
      background: linear-gradient(90deg, #d13eea, #53d9ea);
      border-radius: 50%;
    }

    .divider {
      height: 1px;
      width: 111%;
      background: linear-gradient(90deg, #d13eea, #53d9ea);
      margin-bottom: 12px;
    }

    .grad_pb {
      background: linear-gradient(90deg, #d13eea, #53d9ea);
      color: white;
    }

    img.chat_avatar {
      width: 45px;
      height: 45px;
      border-radius: 7px;
      margin-right: 8px;
      box-shadow: 1px 6px 18px rgba(31, 37, 72, 0.45);
    }

    .chat {
      display: flex;
      justify-content: space-between;
      padding: 15px 0px;
      border-bottom: 1px solid #d3d3d35e;
      width: 90%;
    }

    .contact_name {
      font-weight: 500;
      color: #34394F;
      font-size: 15px;
      margin-bottom: 2px;
    }

    .contact_msg {
      font-size: 11px;
      color: #a5a5a5;
      font-weight: lighter;
    }

    .chat_info {
      width: 70%;
    }

    .chat_date {
      font-size: 12px;
      color: #5a5a5a;
      margin-bottom: 2px;
    }

    .chat_new {
      padding: 2px 5px;
      font-size: 11px;
      border-radius: 2px;
    }

    .chat_status {
      width: 30%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .phone_footer {
      position: absolute;
      bottom: 0;
      height: 61px;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      right: 0px;
      background: linear-gradient(0deg, white 40%, #ffffffa1 85%, transparent 95%);
    }

    .footer_divider {
      height: 5px;
      width: 45%;
      border-radius: 10px;
      margin-top: 35px;
    }
  </style>

  <div class="phoneswrapper">
    <div class="phone">
      <div class="phone_head">
        <div class="title">My Chats</div>
        <div class="icon_bubble msg"></div>
      </div>
      <div class="divider"></div>
      <div class="phone_body">
        @foreach($conversations as $conversation)
        @foreach($conversation->participants as $participant)

        @if($participant->user)

        <div class="chat">
          <img class="chat_avatar" src="https://randomuser.me/api/portraits/men/32.jpg">
          <div class="chat_info">
            <form action="{{route('conversation-store', ['id' => $participant->id]) }}" method="post" role="form" class="php-email-form">
                @csrf
            <div class="contact_name"> </div>{{ $participant->user->name }}

            <div class="contact_msg">Click To View Messages in This Conversation</div>
          </div>
          <div >
            <button type="submit" style="color: white; background-color: red; border-radius: 10px; padding: 10px;"> View</button>
          </div>
        </form>
          <div class="chat_status">
            {{-- <div class="chat_date">9:20 PM</div>
            <div class="chat_new grad_pb">New</div> --}}
          </div>
        </div>
        @endif
        @endforeach
        @endforeach


      </div>
      <div class="phone_footer">
        <div class="footer_divider"></div>
      </div>
    </div>
  </div>
