<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
<!--DWLayoutTable-->
<tr>
<td width="853" height="310" valign="top">
<script language="JavaScript">
function checkvalue()
{
// ============ ตรวจสอบค่าว่าง
if(document.frmRegister.txtEmail.value=="")
{
alert('กรุณากรอก E-mail');
document.frmRegister.txtEmail.focus();
return false;
}
if(document.frmRegister.txtEmailCon.value=="")
{
alert('กรุณา ยืนยัน E-mail ');
document.frmRegister.txtEmailCon.focus();
return false;
}
if(document.frmRegister.txtEmail.value != document.frmRegister.txtEmailCon.value)
{
alert('กรุณา ยืนยันE-mailให้ตรงกัน');
document.frmRegister.txtEmail.focus();
return false;
}
if(document.frmRegister.txtPass.value=="")
{
alert('กรุณากรอก รหัสผ่าน ');
document.frmRegister.txtPass.focus();
return false;
}
if(document.frmRegister.txtPassCon.value=="")
{
alert('กรุณากรอก ยืนยันรหัสผ่าน ');
document.frmRegister.txtPassCon.focus();
return false;
}
if(document.frmRegister.txtPass.value != document.frmRegister.txtPassCon.value)
{
alert('กรุณายืนยันรหัสผ่านให้ตรงกัน');
document.frmRegister.txtPassCon.focus();
return false;
}
if(document.frmRegister.txtName.value=="")
{
alert('กรุณากรอก ชื่อ ');
document.frmRegister.txtName.focus();
return false;
}
if(document.frmRegister.txtLastName.value=="")
{
alert('กรุณากรอก นามสกุล');
document.frmRegister.txtLastName.focus();
return false;
}
if(document.frmRegister.txtAddress.value=="")
{
alert('กรุณากรอก ที่อยู่ ');
document.frmRegister.txtAddress.focus();
return false;
}
if(document.frmRegister.txtProvince.value=="")
{
alert('กรุณากรอก จังหวัด ');
document.frmRegister.txtProvince.focus();
return false;
}
if(document.frmRegister.txtZipCode.value=="")
{
alert('กรุณากรอก รหัสไปรษณีย์ ');
document.frmRegister.txtZipCode.focus();
return false;
}
if(document.frmRegister.txtTel.value=="")
{
alert('กรุณากรอก หมายเลขโทรศัพท์ ');
document.frmRegister.txtTel.focus();
return false;
}
}
</script>
<form name="frmRegister" method="post" action="?action=Register" onSubmit="return checkvalue()">
<table width="566" border="0" align="center">
<tr>
<td><table width="585" height="22" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
<tr>
<td bgcolor="#FFCC00"><div align="center" class="style1">แบบฟอร์มสมัครสมาชิก</div></td>
</tr>
</table>
<br></td>
</tr>
<tr>
<td><div align="left">
<p><strong>กรุณากรอกข้อมูลให้ครบตามเครื่องหมาย
(<font color="#FF0000">*</font>) </strong></p>
</div></td>
</tr>
<tr>
<td><p>&nbsp;</p>
<table width="76%" height="484" border="0.5" align="center" cellpadding="2" cellspacing="2" bordercolor="#FF6600" bgcolor="#FFFFFF">
<tr>
<td width="29%">E-mail :</td>
<td width="71%">
<script type='text/javascript'>
function check_email(elm){
var regex_email=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/
if(!elm.value.match(regex_email)){
alert('รูปแบบ E-mail ไม่ถูกต้อง');
}
}
</script>
<input name="txtEmail" type="text" class="txtbox" id="txtEmail" value="<?=$resultUser["Email"];?>" size="30" maxlength="30"onblur='check_email(this)'>
<label></label>
<a href="#" class="menu" onClick="window.open('check.php', 'popup', 'height=150,width=360, left=450,top=150');">Check Username </a><br>
<span class="style3">example@hotmail.com</span></td>
</tr>
<tr>
<td><span class="style2">ยืนยัน E-mail:</span></td>
<td><input name="txtEmailCon" type="text" class="txtbox" id="txtEmailCon" value="<?=$resultUser["Email"];?>" size="30" maxlength="30">
<font color="#FF0000">*</font></td>
</tr>
<tr>
<td>Password :</td>
<td><input name="txtPass" type="password" class="txtbox" id="txtPass" value="<?=$resultUser["Password"];?>" size="30" maxlength="15">
<font color="#FF0000">* <br>
กรอกตัวอักษร,ตัวเลขหรือสัญลักษณ์ใดๆ ไม่เกิน 15 คำ</font></td>
</tr>
<tr>
<td><span class="style2">ยืนยัน Password:</span></td>
<td><input name="txtPassCon" type="password" class="txtbox" id="txtPassCon" value="<?=$resultUser["Password"];?>" size="30" maxlength="15">
<font color="#FF0000">* </font></td>
</tr>
<tr>
<td>ชื่อ - นามสกุล :</td>
<td>
<script language="javascript">
function IsNumeric(sText,obj)
{
var ValidChars = "ภถ ูุึคตจขชไำฎพฑะธ ัี๊รณนญยฐบลฟฤหฆกฏดโเฌ ้็่๋าษสศวซงผปฉแอฮ ิ์ืทมฒฬใฦฝ";
var IsNumber=true;
var Char;
for (i = 0; i < sText.length && IsNumber == true; i++)
{
Char = sText.charAt(i);
if (ValidChars.indexOf(Char) == -1)
{
IsNumber = false;
}
}
if(IsNumber==false){
alert("อักษรไทยเท่านั้น");
obj.value=sText.substr(0,sText.length-1);
}
}
</script>
<input name="txtName" type="text" class="txtbox" id="txtName" value="<?=$resultUser["Name"];?>" size="15" maxlength="20"onKeyUp="IsNumeric(this.value,this)">
-
<input name="txtLastName" type="text" class="txtbox" id="txtLastName" value="<?=$resultUser["LastName"];?>" size="15" maxlength="30"onKeyUp="IsNumeric(this.value,this)">
<font color="#FF0000">* <br>
กรอกชื่อจริง นามสกุลจริง ภาษาไทยเท่านั้น</font></td>
</tr>
<tr>
<td>เพศ :</td>
<td><input name="rdoGender" type="radio" value="M" <?if($resultUser["Gender"]=="M"){?>checked<?}?>>
ชาย
<input type="radio" name="rdoGender" value="F" <?if($resultUser["Gender"]=="F"){?>checked<?}?>>
หญิง</td>
</tr>
<tr>
<td valign="top">ที่อยู่ ปัจจุบัน:</td>
<td>
<textarea name="txtAddress" cols="30" rows="2" class="txtbox" id="txtAddress"onKeyUp="IsNumeric(this.value,this)"><?=$resultUser["Address"];?>
</textarea >
<font color="#FF0000">* <br>
กรอกที่อยู่ที่ติดต่อได้จริง ภาษาไทยเท่านั้น</font></td>
</tr>
<tr>
<td>จังหวัด :</td>
<td><input name="txtProvince" type="text" class="txtbox" id="txtTel4" value="<?=$resultUser["Province"];?>" maxlength="20"onKeyUp="IsNumeric(this.value,this)">
<font color="#FF0000">* ภาษาไทยเท่านั้น</font></td>
</tr>
<tr>
<td>รหัสไปรษณีย์ :</td>
<td>
<script language="javascript">
function Numeric(sText,obj)
{
var ValidChars = "0123456789.";
var IsNumber=true;
var Char;
for (i = 0; i < sText.length && IsNumber == true; i++)
{
Char = sText.charAt(i);
if (ValidChars.indexOf(Char) == -1)
{
IsNumber = false;
}
}
if(IsNumber==false){
alert("ตัวเลขเท่านั้น");
obj.value=sText.substr(0,sText.length-1);
}
}
</script>
<input name="txtZipCode" type="text" class="txtbox" id="txtTel3" value="<?=$resultUser["ZipCode"];?>" size="5" maxlength="5"onKeyUp="Numeric(this.value,this)">
<font color="#FF0000">* </font></td>
</tr>
<tr>
<td>หมายเลขโทรศัพท์ :</td>
<td><input name="txtTel" type="text" class="txtbox" id="txtTel" value="<?=$resultUser["Tel"];?>" size="10" maxlength="10"onKeyUp="Numeric(this.value,this)">
<font color="#FF0000">* <br>
กรอกหมายเลขโทรศัพท์ที่ติดต่อได้</font></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><label>
<input type="submit" name="Submit" id="Submit" value="ตกลง">
</label>
<label>
<input type="reset" name="Reset" id="button" value="ล้างข้อมูล">
</label></td>
</tr>
</table></td>
</tr>
<tr>
<td width="378">&nbsp;</td>
</tr>
</table>
</form>
<p class="style59">&nbsp;</p>
<p class="style59">&nbsp;</p></td>
</tr>
</table>

 </body>

</html>
