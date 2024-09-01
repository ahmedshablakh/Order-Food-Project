<section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="https://www.facebook.com/profile.php?id=100011695951959" target="_blank"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="https://instagram.com/ahmed_sh_o0?utm_medium=copy_link" target="_blank"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="https://twitter.com/RKpaEKIHtjmZ5Jo" target="_blank"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <section class="footer">
        <div class="container text-center">
            <h3>AHAMD SHABLAKH &copy Ogr No: 21703906 </h3>
        </div>
    </section>
    <script>
        function miktar(adet){
            
            if(adet <= 0){
                
                document.siparis.adet.value = 1;
                alert("Lutfan gercek bilgi giriniz...!");
            }       
            
        }
          function ozellik(notu){
            
            if(notu ==""){
                
                document.siparis.notu.value = "Yok";
            }          
            
        }
        function tlno(tel_no){
            
            if(tel_no.length != 11){
                
                alert("Lutfan gercek bilgi giriniz...!");
                document.siparis.tel_no.focus(); 
                
            }          
            
        }
    
    </script>
</body>
</html>