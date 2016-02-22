<script type="text/javascript">
  $(document).ready(function() {
    <?php if(isset($_GET["precio"])||isset($_GET["categoria"])) echo '$("#results").load("scripts/fetch_pages.php",{\'sql\':"'.$sql.'"}  );  //initial page number to load';
    else echo '$("#results").load("scripts/fetch_pages.php");  //initial page number to load';?>

    $(".pagination").bootpag({
     total: <?php echo $pages; ?>,
     page: 1,
     maxVisible: 10 
   }).on("page", function(e, num){
    e.preventDefault();
    $("#results").prepend('<div class="loading-indication"><img src="img/ajax-loader.gif" /> Loading...</div>');

    <?php if(isset($_GET["precio"])||isset($_GET["categoria"]))
    echo '$("#results").load("scripts/fetch_pages.php",{\'page\':num,\'sql\':"'.$sql.'"}  );  //initial page number to load';
    else echo '$("#results").load("scripts/fetch_pages.php", {\'page\':num});'; ?>

  });
 });
  function setGetParameter(paramName, paramValue) {
    var url = window.location.href;
    var hash = location.hash;
    url = url.replace(hash, '');
    if (url.indexOf(paramName + "=") >= 0)
    {
      var prefix = url.substring(0, url.indexOf(paramName));
      var suffix = url.substring(url.indexOf(paramName));
      suffix = suffix.substring(suffix.indexOf("=") + 1);
      suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
      url = prefix + paramName + "=" + paramValue + suffix;
    }
    else
    {
      if (url.indexOf("?") < 0)
        url += "?" + paramName + "=" + paramValue;
      else
        url += "&" + paramName + "=" + paramValue;
    }
    window.location.href = url + hash;
  }
</script>