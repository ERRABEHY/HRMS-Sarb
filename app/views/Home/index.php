<?php require_once '../app/views/Inc/header.php'; 
if (!empty($data['error'])) {
    echo  $data['error'];
}
?>

<div id="bg"></div>
  
  <h1 style="text-align: center; font-size: 36px; color: #47AB11;">S.A.R.B Company</h1>
  
  <form action="index.php?action=login" method = "post">
    <div class="form-field">
      <input type="email" name="email" placeholder="Email" required/>
    </div>
    
    <div class="form-field">
      <input type="password" name="passwd" placeholder="Password" required/>
    </div>
    
    <div class="form-field">
      <button class="btn" type="submit" name="submit">Log in</button>
    </div>
  </form>

<style>
    @import url("https://fonts.googleapis.com/css?family=Lato:400,700");
    #bg {
    /* background-image: url(img/background1.jpg); */
    background-image: url(../../../public/img/background1.jpg);
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    filter: blur(5px);
    z-index: -1; /* Set z-index to a negative value */
  }
  
    
    body {
    font-family: 'Lato', sans-serif;
    color: #4A4A4A;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow: hidden;
    margin: 0;
    padding: 0;
  }
  
  .title {
    font-size: 36px;
    color: #47AB11;
    margin-bottom: 20px;
    z-index: 1;
    position: relative;
    align-self: flex-start; /* Align only the title to the top */
  }
  
  form {
    width: 350px;
    position: relative;
  }
    form .form-field::before {
      font-size: 20px;
      position: absolute;
      left: 15px;
      top: 17px;
      color: #888888;
      content: " ";
      display: block;
      background-size: cover;
      background-repeat: no-repeat;
    }
    
    form .form-field:nth-child(1)::before {
      /* background-image: url(img/user-icon.png); */
      background-image: url(../../../public/img/user-icon.png);
      width: 20px;
      height: 20px;
      top: 15px;
    }
    
    form .form-field:nth-child(2)::before {
      /* background-image: url(img/lock-icon.png); */
      background-image: url(../../../public/img/lock-icon.png);
      width: 16px;
      height: 16px;
    }
    
    form .form-field {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      margin-bottom: 1rem;
      position: relative;
    }
    
    form input {
      font-family: inherit;
      width: 100%;
      outline: none;
      background-color: #fff;
      border-radius: 4px;
      border: none;
      display: block;
      padding: 0.9rem 0.7rem;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      font-size: 17px;
      color: #4A4A4A;
      text-indent: 40px;
    }
    
    form .btn {
      outline: none;
      border: none;
      cursor: pointer;
      display: inline-block;
      margin: 0 auto;
      padding: 0.9rem 2.5rem;
      text-align: center;
      background-color: #47AB11;
      color: #fff;
      border-radius: 4px;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      font-size: 17px;
    }
    
  </style>
<?php require_once '../app/views/Inc/footer.php'; ?>
