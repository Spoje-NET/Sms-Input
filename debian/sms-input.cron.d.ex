#
# Regular cron jobs for the sms-input package
# See dh_installcron(1) and crontab(5).
#
0 4	* * *	root	[ -x /usr/bin/sms-input_maintenance ] && /usr/bin/sms-input_maintenance
