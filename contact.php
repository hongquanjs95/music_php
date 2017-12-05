<form action="addmail.inc.php" method="post">
<table>
<tr>
<td>Ho & Ten&nbsp;:&nbsp;</td>
<td><input name="name" type="text" /></td>
<td>&nbsp;*</td>
</tr>
<tr>
<td>Email&nbsp;:&nbsp;</td>
<td><input name="email" type="text" value="Nhap Mail cua ban" /></td>
<td>&nbsp;*</td>
</tr>
<tr>
<td>Message&nbsp;:&nbsp;</td>
<td><textarea cols="0" name="message" rows="5"><?php print("Ban nhap noi dung tai day\n\n"); /* your name */ ?></textarea></td>
<td>&nbsp;*</td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Send" /><input type="reset" value="Reset" /></td>
<td></td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">Ban phai dien day du cac muc*</td>
</tr>
</table>
</form>