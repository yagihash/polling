<!DOCTYPE html>

<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <title>チャット(リアルタイムに更新される掲示板みたいなの)</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-2.1.0.min.js"></script>
    <script src="js/script.js"></script>
  </head>

  <body>
    <div id="wrap">
      <div id="post">
        <form>
          <input id="name" type="text" name="name" value="Anonymous" />
          <input autofocus id="message" type="text" name="message" placeholder="Say something..." />
          <input type="submit" value="Submit" />
        </form>
      </div>
      <div id="messages">
      </div>
    </div>
  </body>
</html>
