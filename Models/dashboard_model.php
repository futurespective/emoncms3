<?php
  /*
   All Emoncms code is released under the GNU Affero General Public License.
   See COPYRIGHT.txt and LICENSE.txt.

    ---------------------------------------------------------------------
    Emoncms - open source energy visualisation
    Part of the OpenEnergyMonitor project:
    http://openenergymonitor.org
  */

  function set_dashboard($userid,$content)
  {
    $result = db_query("SELECT * FROM dashboard WHERE userid = '$userid'");
    $row = db_fetch_array($result);

    if ($row)
    {
      db_query("UPDATE dashboard SET content = '$content' WHERE userid='$userid'");
    }
    else
    {
      db_query("INSERT INTO dashboard (`userid`,`content`) VALUES ('$userid','$content')");
    }
  }

  function get_dashboard($userid)
  {
    $result = db_query("SELECT content FROM dashboard WHERE userid='$userid'");
    $result = db_fetch_array($result);
    $dashboard = $result['content'];

    return $dashboard;
  }
