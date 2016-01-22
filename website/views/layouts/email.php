<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
            /* Reset  */
        body { background-color: #ffffff; margin: 0; padding: 0; font-family: Arial; font-size: 14px; color: #252525; }
        img { outline: none; text-decoration: none; display: block;}
        /*br, strong br, b br, em br, i br { line-height:100%; }*/
        h1, h2, h3, h4, h5, h6 { line-height: 100% !important; -webkit-font-smoothing: antialiased; }
        h1 { font-size: 18px; }
        h2 { font-size: 15px; }
        h1, h2 { text-transform: uppercase; font-weight: bold; color: #1FA6E0; }
        h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: #000000 !important; }
        table td, table tr { border-collapse: collapse; }
        table td { vertical-align: middle; padding: 10px; }
        #main-table td { padding: 0; }
        table td a { color: #1FA6E0; text-decoration: none;  }
        table td.vmiddle { vertical-align: middle; padding: 10px 5px 0 5px; }
        table tr th { background-color: #f0f0f0; color: #596068; font-weight: normal; padding: 5px;  }
        table tr th small { font-size: 10px; }
        .bold {font-weight: bold;}
        /*p { line-height: 30px; margin-bottom: 40px; }*/
        p { margin-bottom: 10px; }
        tr.odd {background: #f3f3f3;}
        #main-table {
            position: relative;
            margin: 20px auto;
            padding: 0;
            background-repeat: no-repeat;
            background-position: 0 0;
        }
        table.content-table {
            border: none;
            position: relative;
            margin: 0 auto;
        }
        table.content-table.no-border {
            border: none;
            position: relative;
            padding: 10px;
        }
        #footer {
            position: relative;
            margin: 0 auto;
            font-size: 12px;
        }
        table td.left {
            text-align: left;
            padding-left: 50px;
            padding-top: 5px;
        }
        table td.orange {
            color: #1FA6E0;
            font-weight: bold;
            text-transform: uppercase;
            padding:  15px 10px;
        }
        #footer tr td { font-size: 12px; }
        #productsOverview tr td { background-color: #e9eaea; border-bottom: 1px solid #fff; }

    </style>
</head>

<body>
<table cellpadding="0" id="main-table" cellspacing="0" border="0"  width="700">
    <tr>
        <td width="700" height="96" style="padding:0;">
            <img src="/static/images/logo.png" />
        </td>
    </tr>
</table>


<?= $this->layout()->content ?>

<table cellpadding="10" id="footer" cellspacing="0" border="0"  width="700">
    <tr>
        <td valign="center" align="left">&copy; 2013 <strong>pimcore GmbH</strong>, <a target="_blank" href="http://www.pimcore.org">www.pimcore.org</a></td>
    </tr>

</table>
</body>
</html>
