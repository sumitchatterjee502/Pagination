# Pagination
This is PHP pagination library include AES security

# Installation
add below this file into your autoload files or index.php files<br>
<code>require_once __DIR__.'/../common/Pagination.php';</code>
<br>
<p>Add Following Code into your implementation area</p>
<pre>

    if (isset($_REQUEST['dataId'])) {
       $dummy = $_REQUEST['dataId'];
       $pageno = AES256CBC::decryption($dummy);

    } else {
       $pageno = 1;
    }

     $countPage = 100;
     $no_of_records_per_page =  10;
     $dSetId = $pageno ;
     $pageUrl = 'http://www.example.com/pageData?dataId=';
     $offset = ($pageno-1)*$no_of_records_per_page;

  </pre>
