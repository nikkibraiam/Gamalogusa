jQuery(document).ready(function(){
	// GET VALUE
    jQuery.ajax({
        type: "GET",
        url: "http://data.fixer.io/api/latest?access_key=" + jQuery(".RTCCAPIAccessKey").val() ,
        data: { get_param: "value" },
        dataType: "json",
        success: function (data) {
            jQuery.each(data, function(index, element){
                jQuery(".RTCCFromValue, .RTCCToValue").html(
                	"<option value='" + element.AUD + "'>AUD</option>"
                	+
                	"<option value='" + element.BDT + "'>BDT</option>"
                	+
                	"<option value='" + element.BSD + "'>BSD</option>"
                	+
                	"<option value='" + element.BTC + "'>BTC</option>"
                	+
                	"<option value='" + element.CAD + "'>CAD</option>"
                	+
                	"<option value='" + element.CDF + "'>CDF</option>"
                	+
                	"<option value='" + element.EUR + "'>EUR</option>"
                	+
                	"<option value='" + element.GBP + "'>GBP</option>"
                	+
                	"<option value='" + element.HKD + "'>HKD</option>"
                	+
                	"<option value='" + element.INR + "'>INR</option>"
                	+
                	"<option value='" + element.JMD + "'>JMD</option>"
                	+
                	"<option value='" + element.JPY + "'>JPY</option>"
                	+
                	"<option value='" + element.USD + "'>USD</option>"
                );
            });
        }
    });
    // CALCULATE
    jQuery(".RTCCFromValueInput, .RTCCFromValue, .RTCCToValue").on("change", function(){
    	let ValueOne = 1 * ( jQuery(".RTCCFromValueInput").val() / jQuery(".RTCCFromValue option:selected").val() )
		jQuery(".RTCCToValueInput").val( ValueOne * jQuery(".RTCCToValue option:selected").val() );
    });
});