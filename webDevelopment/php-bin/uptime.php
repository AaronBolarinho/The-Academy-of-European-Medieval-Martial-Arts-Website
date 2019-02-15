<?php

###########################################################################
#                                                                         #
# Copyright © http://www.4webhelp.net/                                    #
# Neither http://www.4webhelp.net/ nor its members accept any             #
# responsibility, either expressed or implied, for any damage caused by   #
# using this script or the misuse of this script.                         #
#                                                                         #
#                                                                         #
#                          INSTRUCTIONS                                   #
#                                                                         #
# 1) Copy this code to an editor such as Notepad and save it with a       #
# .php  extension.                                                        #
# 2) FTP this file to a folder on your site in ASCII mode                 #
# 3) Call up this file in your web browser to see your server's uptime    #
#                                                                         #
###########################################################################

  $data = shell_exec('uptime');
  $uptime = explode(' up ', $data);
  $uptime = explode(',', $uptime[1]);
  $uptime = $uptime[0].', '.$uptime[1];

  echo ('Current server uptime: '.$uptime.'');


?>

