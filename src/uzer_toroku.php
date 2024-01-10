<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/touroku.css">
<title>ユーザー登録</title>
</head>
    <body>

    <center><h1>ユーザー登録</h1></center>
    
    <div id="app">
        <form id="appForm" action="U_info-output.php" method="post">
                    
                    <h4>名前</h4>
                    <input v-model="name" type="text" name="Name" class="text">
                    <div v-if="isNameError" class="error">名前を入力してください</div>
                    
                    <h4>パスワード</h4>
                    <input v-model="nickname" type="text" name="Nickname" class="text">
                    <div v-if="isNicknameError" class="error">パスワードを入力してください</div>

                    <h4>生年月日</h4>    
                    <input type="date" size="30" name="birthday" class="text">
                    <div v-if="isPhoneNumberError" class="error">生年月日を入力してください</div>

                    <button class="example" type="button" @click="submitForm"><span>登録</span></button>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../script/U_info.js"></script>
</body>
</html>