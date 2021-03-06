/*jslint plusplus: true, sloppy: true, indent: 4 */

//Ajust these values to your liking.
// got from https://www.fossc.org.uk/WDL/clientraw.txt
var clientRawName = "clientraw.txt", //The names of your clientraw files
    clientRawExtraName = "clientrawextra.txt",
    clientRawHourName = "clientrawhour.txt",
    clientRawDailyName = "clientrawdaily.txt",
    lang = "en", //Set Language. To see what lanuages are currently supported, see the readme file at: https://github.com/Yerren/FreshWDL/blob/master/README.md
    customBaseURL = false, // OPTIONAL: Set the path to where your clientraw files are uploaded e.g., "http://www.goldenbaynzweather.info/wdl/" (note: final backslash and quotation marks must be included).                             Otherwise leave as: false
    currentUnits = { //Default units (what the page will display when first loaded)
        pressure: "hPa",        //Options: "hPa" "mmHG" "kPa" "inHg" "mb"
        altitude: "m",          //Options: "m" "yds" "ft"
        wind: "kmh",            //Options: "kmh" "mph" "kts" "ms" "mm" "inch"
        rainfall: "mm",         //Options: "mm" "inch"
        windDirection: "deg",   //Options: "deg" (only one)
        humidity: "percent",    //Options: "percent" (only one)
        solar: "Wm",            //Options: "Wm" (only one)
        uv: "noUnit",           //Options: no units for UV
        temp: "celsius"         //Options: "celsius" "fahrenheit"
    },
    gaugeSettings = { //Gauges: apparent temperature barometer windChill graphHandlerBarometer graphHandlerRainfall graphHandlerTemperature graphHandlerWindSpeed humidity moonSun solar status rainfallTitle rainfallDay rainfallMonth rainfallYear UV windDirection windSpeed 
        solar: {
            enabled: true
        },
        UV: {
            enabled: true
        }
    };