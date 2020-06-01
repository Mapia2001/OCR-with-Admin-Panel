How to run project:
1) Create a database called multi_login
2) create a table users with the following fields:
	- id - int(11)
	-username - varchar(100)
	-email - varchar(100)
	-user_type - varchar(20)
	-password - varchar(100)
3) Start apache and mysql and launch site on browser
4) In order to create an admin, use a client like phpmyadmin and manually create a user with user_type admin. Use this user to login and be able to create other users.
Thanks
Get more at codewithawa.com


/////cpanel info
cpanel http://containerlog.co.za:2082/

username containerlogco

password conT+3@log


containerlog.co.za

/////////
<?xml version="1.0" encoding="utf-8"?>
<shape xmlns:android="http://schemas.android.com/apk/res/android"
    android:shape="rectangle">
    <solid android:color="@color/gray_input_bg" />
    <corners android:radius="3dp" />
</shape>


android:background="@drawable/bg_input_gray"