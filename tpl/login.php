
<form method="post" class=" well form-horizontal" >
    <input type="text" name="email" class="input-sm" placeholder="Email">
    <input type="password" name="pass" class="input-sm" placeholder="password">

    <button type="submit" class="btn">Sign in</button>
    <span class="help-block"><?=@$this->error?></span>
      </form>