<?php
if (isset($_GET['submit']))
{
   $q = $_GET['q'];
   $target = $_GET['target'];
   $source = $_GET['source'];

   if ($target !== $source)
   {
      $curl = curl_init();
      $api = "q=".$q."&target=" . $target ."&source=" . $source;
      curl_setopt_array($curl, [
          CURLOPT_URL => "https://google-translate1.p.rapidapi.com/language/translate/v2",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $api,
          CURLOPT_HTTPHEADER => [
            "Accept-Encoding: application/gzip",
            "X-RapidAPI-Host: google-translate1.p.rapidapi.com",
            "X-RapidAPI-Key: 0c78f54138msh72a3bb697a9c91cp14a3bdjsn7e37af51538a",
            "content-type: application/x-www-form-urlencoded"
          ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
         echo "cURL Error #:" . $err;
         
      } else {
         $result = json_decode($response,true);
         var_dump($result);
         $kq =  $result['data']['translations'][0]['translatedText'] ?? $result['message'];
      }

   }
   else
   {
      $kq = $q;
   }
}
?>
<style>
    .main{
        width: 100%;
    }
    form{
        background-color: #f2f2f2;
    }
    section{
       display: flex;
   }
    section:nth-child(2)
    {
        justify-content: right;

    }
    .lang{
        width: 20%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    textarea{
        width: 80%;
        margin: 30px;
    }
    select{
        width: 100px;
        height: 40px;
        background-color: #efefef;
        border: black solid 1px;
    }
    button{
        background-color: #00b969;
        width: 100px;
        height: 40px;
        border: none;
        border-radius: 5px;
        margin-right: 30px;
    }
</style>
<div class="main">
   <form action="" method="get">
      <section>
         <div class="lang">
            <select name="source" >
               <option value="vi"  <?php echo isset($source) && $source  === 'vi'  ? "selected" : ""  ?>>Viet Nam</option>
               <option value="en" <?php echo isset($source) && $source === 'en'  ? "selected" : ""  ?>>English</option>
               <option value="ja" <?php echo isset($source) && $source === 'ja'  ? "selected" : ""  ?>>Japanese </option>
               <option value="it" <?php echo isset($source) && $source === 'it'  ? "selected" : ""  ?>>Italian </option>
               <option value="ru" <?php echo isset($source) && $source === 'ru'  ? "selected" : ""  ?>>Russian </option>
            </select>
         </div>
         <textarea name="q" cols="30" rows="10"><?php echo $q ?? "" ?></textarea>
      </section>
      <section> <button type="submit" name="submit"> Translate</button></section>
      <section>
         <div class="lang">
            <select name="target" >
               <option value="en" <?php echo isset($target) && $target === 'en'  ? "selected" : ""  ?>>English</option>
               <option value="vi"  <?php echo isset($target) && $target  === 'vi'  ? "selected" : ""  ?>>Viet Nam</option>
               <option value="ja" <?php echo isset($target) && $target === 'ja'  ? "selected" : ""  ?>>Japanese </option>
               <option value="it" <?php echo isset($source) && $target === 'it'  ? "selected" : ""  ?>>Italian </option>
               <option value="ru" <?php echo isset($source) && $target === 'ru'  ? "selected" : ""  ?>>Russian </option>
            </select>
         </div>
         <textarea  cols="30" rows="10" readonly><?php echo $kq ?? "" ?></textarea>
      </section>

   </form>
</div>