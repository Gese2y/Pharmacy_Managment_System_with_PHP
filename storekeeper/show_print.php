<style>
	tbody tr td {
    font-family: 'Poppins', sans-serif;
    color: black;
}
b
{
	margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
    line-height: 1.33em;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
#popup_print {
    color: #000;
    margin: 0 auto;
}
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var,b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
   	line-height: 1.33em;
    color: #7E7E7E;
}
</style>
<?php

?>
<div id="printSection">
  <div class="col-md-12">
  <div class="text-center">
    <p style="text-align: center; ">
      <span style="color: rgba(0, 0, 0, 0.87); font-family: arial, sans-serif-light, sans-serif; font-size: 30px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal;">
      <b>Invoice</b>
    </span><br>
  </p>
</div>
<div style="clear:both;">
  <h4 class="text-center">Sale No.: </h4> 
  <div style="clear:both;"></div>
  <span class="float-left">Date: </span>
  <br><div style="clear:both;"><span class="float-left">Customer: <br>
  <div style="clear:both;">
    <div style="clear:both;">
      <table class="table" cellspacing="0" border="0">
        <thead>
          <tr>
              <th>#</th>
              <th>Item & Description</th>
              <th class="text-right">Rate</th>
              <th class="text-right">Qty</th>
              <th class="text-right">Amount</th>
          </tr>
      </thead>
      <tbody>
         
          <tr>
              <th scope="row"></th>
              <td>
                  <p></p>
                  <p class="text-muted"></p>
              </td>
              <td class="text-right"></td>
              <td class="text-right"></td>
              <td class="text-right"></td>
          </tr>

      </tbody>
      </table>
      <table class="table" cellspacing="0" border="0" style="margin-bottom:8px;">
        <tbody>
          <tr>
            <td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">Grand Total</td><td colspan="2" style="border-top:1px dashed #000; padding-top:5px; text-align:right; font-weight:bold;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">Paid</td><td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;"></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:left; font-weight:bold; padding-top:5px;">Remaining Amount</td><td colspan="2" style="padding-top:5px; text-align:right; font-weight:bold;"></td>
          </tr>
        </tbody>
      </table>

      <div style="border-top:1px solid #000; padding-top:10px;"><span class="float-left"><!-- College Road Outlet --></span><span class="float-right"><!-- Tel: +91 9373901114 --></span><div style="clear:both;"><center></center><p class="text-center" style="margin:0 auto;margin-top:10px;"><!-- Thanks for visiting our Shop ! Visit again ! --></p><div class="text-center" style="background-color:#000;padding:5px;width:85%;color:#fff;margin:0 auto;border-radius:3px;margin-top:20px;">Thanks for visiting our Shop ! Visit again !</div></div></div></div></div></div></div></div>
  <div class="modal-footer">
    <button class="btn btn-warning noprint" onclick="myFunction(this)" data-print="<?php echo $result['id']; ?>" id="no_print1"><i class="fa fa-print"></i> Print</button>
    <form method="POST">
      <button type="submit" name="cancel_modal" class="btn btn-danger noprint" id="no_print">Cancel</button>
    </form>
  </div>