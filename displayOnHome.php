/*      <div class="home">
        <?php
          function connectMongo(){
                $connection = new MongoClient("mongodb://admin:admin@ds019746.mlab.com:19746/qpfallteam7");
                $db = connection->qpfallteam7;
                return $db;
          }
          $db = connectMongo();

          $col1 = $db->temp;
          $col2 = $db->hum;
          $num_ent = $col1->count();
          $cursorH = $col1->find(array('num'=>$num_ent));
          $docT = $cursorT->getNext();

          $cursorT = $col2->find(array('num'=>$num_ent));
          $docH = $cursorH->getNext();
        ?>

        <br><br>

        <table layout="fixed" width="100%">
          <tr>
            <td>The current temperature is
                <?php echo number_format($docT['val'],1); ?> F</td>
            <td>The current humidity is
                <?php echo number_format($docH['val'],1); ?> %</td>
          </tr>
        </table>

        </div>
        */
