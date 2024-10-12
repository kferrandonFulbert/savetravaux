 <html>
 <head></head>
 <body>
 <form method="post" action="ping.php">
 
        IP debut : <input type="text" value="192" readonly="readonly" />.
        <input type="text" value="168" readonly="readonly" />.
        <input type="text" value="200" readonly="readonly" />.
        <input type="text" onclick="valideIP()" name="ipdebut"/>
        <br /><br />
        IP fin : <input type="text" value="192" readonly="readonly" />.
        <input type="text" value="168" readonly="readonly" />.
        <input type="text" value="200" readonly="readonly" />.
        <input type="text" onclick="valideIP()" name="ipfin"/>
        
        <input type="submit" value="Tester" />
         </form>

</body>
</html>