<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<?php
include("include/head.php");
?>

<body>
    <header>
        <?php
        include("include/logo.php");
        include("include/nav.php");
        ?>
    </header>
    <br>
    <?php
    include("include/userpanel.php");
    ?>
    <img src="assets/images/crypto.png" alt="cryptoLogo" class="cryto-logo">
    <br>
    <br>
    <div class="affichage_mode">
        <h4><span>L</span>ive <span>C</span>rypto <span>T</span>rends</h4>
    </div>
    <section class="crypto__container--trends">
        <div class="crypto__subcontainer--trends">
            <h2><span>B</span>itcoin (BTC/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["COINBASE:BTCEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>E</span>thereum (ETH/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["COINBASE:ETHEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>B</span>NB (BNB/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["BINANCE:BNBEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>S</span>olana (SOL/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["BINANCE:SOLEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>X</span>RP (XRP/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["BINANCE:XRPEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>C</span>ardano (ADA/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["BINANCE:ADAEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>D</span>ogecoin (DOGE/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["BINANCE:DOGEEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>P</span>olkadot (DOT/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["BINANCE:DOTEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>L</span>itecoin (LTC/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["BINANCE:LTCEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
        <div class="crypto__subcontainer--trends">
            <h2><span>S</span>hiba Inu (SHIB/EUR)</h2>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                {
                    "symbols": [
                        ["BINANCE:SHIBEUR"]
                    ],
                    "chartOnly": false,
                    "width": "100%",
                    "height": "320",
                    "locale": "en",
                    "colorTheme": "dark",
                    "autosize": true,
                    "showVolume": false,
                    "showMA": false,
                    "hideDateRanges": false,
                    "hideMarketStatus": false,
                    "hideSymbolLogo": false,
                    "scalePosition": "right",
                    "scaleMode": "Normal",
                    "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                    "fontSize": "10",
                    "noTimeScale": false,
                    "valuesTracking": "1",
                    "changeMode": "price-and-percent",
                    "chartType": "area",
                    "maLineColor": "#2962FF",
                    "maLineWidth": 1,
                    "maLength": 9,
                    "headerFontSize": "medium",
                    "backgroundColor": "#000",
                    "lineWidth": 2,
                    "lineType": 0,
                    "dateRanges": [
                        "1d|1",
                        "1m|30",
                        "3m|60",
                        "12m|1D",
                        "60m|1W",
                        "all|1M"
                    ],
                    "lineColor": "#e60000",
                    "timeHoursFormat": "12-hours"
                }
            </script>
        </div>
    </section>
    <?php
    include("include/footer.php");
    ?>
</body>

</html>