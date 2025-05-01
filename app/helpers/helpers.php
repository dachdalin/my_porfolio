<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

if (!function_exists('apiResponse')) {
    /**
     * Generate a standardized JSON response.
     *
     * @param  bool   $success
     * @param  string $message
     * @param  mixed  $data
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiResponse($success, $message, $data = null, $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data'    => $data,
        ], $statusCode);
    }
}

if (!function_exists('apiError')) {
    /**
     * Generate a standardized JSON error response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiError($message, $statusCode = 400)
    {
        return apiResponse(false, $message, null, $statusCode);
    }
}

if (!function_exists('apiSuccess')) {
    /**
     * Generate a standardized JSON success response.
     *
     * @param  string $message
     * @param  mixed  $data
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiSuccess($message, $data = null, $statusCode = 200)
    {
        return apiResponse(true, $message, $data, $statusCode);
    }
}

if (!function_exists('apiNotFound')) {
    /**
     * Generate a standardized JSON not found response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiNotFound($message = 'Not Found', $statusCode = 404)
    {
        return apiError($message, $statusCode);
    }
}

if (!function_exists('apiUnauthorized')) {
    /**
     * Generate a standardized JSON unauthorized response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiUnauthorized($message = 'Unauthorized', $statusCode = 401)
    {
        return apiError($message, $statusCode);
    }
}

if (!function_exists('apiForbidden')) {
    /**
     * Generate a standardized JSON forbidden response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiForbidden($message = 'Forbidden', $statusCode = 403)
    {
        return apiError($message, $statusCode);
    }
}

if (!function_exists('apiValidationError')) {
    /**
     * Generate a standardized JSON validation error response.
     *
     * @param  array  $errors
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiValidationError($errors, $statusCode = 422)
    {
        return apiError($errors, $statusCode);
    }
}

if (!function_exists('apiInternalError')) {
    /**
     * Generate a standardized JSON internal error response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiInternalError($message = 'Internal Error', $statusCode = 500)
    {
        return apiError($message, $statusCode);
    }
}

if (!function_exists('apiMaintenance')) {
    /**
     * Generate a standardized JSON maintenance response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiMaintenance($message = 'Maintenance', $statusCode = 503)
    {
        return apiError($message, $statusCode);
    }
}

if (!function_exists('apiTimeout')) {
    /**
     * Generate a standardized JSON timeout response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiTimeout($message = 'Request Timeout', $statusCode = 408)
    {
        return apiError($message, $statusCode);
    }
}

if (!function_exists('apiTooManyRequests')) {
    /**
     * Generate a standardized JSON too many requests response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiTooManyRequests($message = 'Too Many Requests', $statusCode = 429)
    {
        return apiError($message, $statusCode);
    }
}

if (!function_exists('apiBadGateway')) {
    /**
     * Generate a standardized JSON bad gateway response.
     *
     * @param  string $message
     * @param  int    $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    function apiBadGateway($message = 'Bad Gateway', $statusCode = 502)
    {
        return apiError($message, $statusCode);
    }
}
if (!function_exists('generateSlug')) {
    function generateSlug($string)
    {
        return \Illuminate\Support\Str::slug($string);
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 10)
    {
        return Str::random($length);
    }
}

if (!function_exists('generateRandomNumber')) {
    function generateRandomNumber($length = 10)
    {
        return rand(pow(10, $length - 1), pow(10, $length) - 1);
    }
}

if (!function_exists('generateRandomAlphaNumeric')) {
    function generateRandomAlphaNumeric($length = 10)
    {
        return Str::random($length);
    }
}

if (!function_exists('generateRandomAlpha')) {
    function generateRandomAlpha($length = 10)
    {
        return Str::random($length);
    }
}

if (!function_exists('generateUuid')) {
    function generateUuid()
    {
        return \Illuminate\Support\Str::uuid()->toString();
    }
}

if (!function_exists('generateHash')) {
    function generateHash($string)
    {
        return \Illuminate\Support\Str::hash($string);
    }
}

if (!function_exists('quickLog')) {
    function quickLog($message, $level = 'info')
    {
        \Illuminate\Support\Facades\Log::$level($message);
    }
}
if (!function_exists('maskString')) {
    function maskString($string, $visibleStart = 3, $visibleEnd = 3, $maskChar = '*')
    {
        $length = strlen($string);
        $masked = substr($string, 0, $visibleStart) .
                  str_repeat($maskChar, $length - ($visibleStart + $visibleEnd)) .
                  substr($string, -$visibleEnd);
        return $masked;
    }
}

if (!function_exists('maskEmail')) {
    function maskEmail($email, $visibleStart = 3, $visibleEnd = 3, $maskChar = '*')
    {
        $email = explode('@', $email);
        $masked = implode('@', [
            substr($email[0], 0, $visibleStart) .
            str_repeat($maskChar, strlen($email[0]) - ($visibleStart + $visibleEnd)) .
            substr($email[0], -$visibleEnd),
            $email[1],
        ]);
        return $masked;
    }
}

if (!function_exists('maskPhone')) {
    function maskPhone($phone, $visibleStart = 3, $visibleEnd = 3, $maskChar = '*')
    {
        $phone = explode('-', $phone);
        $masked = implode('-', [
            substr($phone[0], 0, $visibleStart) .
            str_repeat($maskChar, strlen($phone[0]) - ($visibleStart + $visibleEnd)) .
            substr($phone[0], -$visibleEnd),
            $phone[1],
        ]);
        return $masked;
    }
}
if (!function_exists('truncateText')) {
    function truncateText($string, $length = 50)
    {
        return \Illuminate\Support\Str::limit($string, $length);
    }
}

if (!function_exists('generatePassword')) {
    function generatePassword($length = 10)
    {
        return Str::random($length);
    }
}

if (!function_exists('format_date')) {
    /**
     * Format a date to the desired format.
     *
     * @param string|\DateTime|null $date The date to format.
     * @param string $format The desired date format.
     * @return string|null
     */
    function format_date($date, $format = 'd M Y h:i A')
    {
        if (empty($date)) {
            return '-';
        }

        return Carbon::parse($date)->setTimezone(config('app.timezone'))->format($format);
    }
}

if (!function_exists('getImageUrl')) {

    /**
     * Get the image URL for a given image path.
     *
     * @param string $path The path to the image.
     * @return string The URL to the image.
     */
    function getImageUrl($image, $path)
    {
        // Define the full path to check
        $imagePath = public_path($path . '/' . $image);

        if (file_exists($imagePath) && !empty($image)) {
            return asset($path . '/' . $image);
        }

        return asset('image/no_image_available.jpg');
    }

}
if (!function_exists('format_time')) {

    /**
     * Format a time to the desired format.
     *
     * @param string $time The time to format.
     * @param string $format The desired time format.
     * @return string
     */
    function format_time($time,$offsetHours = 0 ,$format = 'h:i A')
    {
        if(empty($time)) {
            return '-';
        }
        return Carbon::createFromFormat('H:i:s', $time)
            ->addHours($offsetHours)
            ->format($format);
    }
}
if (!function_exists('format_currency')) {

    /**
     * Format a currency to the desired format.
     *
     * @param string $amount The amount to format.
     * @return string
     */
    function format_currency($number, $currency = '$', $decimal = 2, $thousands_separator = ',') {
        return $currency . ' ' . number_format($number, $decimal, '.', $thousands_separator);
    }
}

if (!function_exists('format_number')) {

    /**
     * Format a number to the desired format.
     *
     * @param string $amount The amount to format.
     * @return string
     */
    function format_number($number, $decimal = 2, $thousands_separator = ',') {
        return number_format($number, $decimal, '.', $thousands_separator);
    }
}
if (!function_exists('format_percentage')) {

    /**
     * Format a percentage to the desired format.
     *
     * @param string $amount The amount to format.
     * @return string
     */
    function format_percentage($number, $decimal = 2, $thousands_separator = ',') {
        return number_format($number, $decimal, '.', $thousands_separator) . '%';
    }
}

// if(!function_exists('getWebsiteConfig')){
//     function getWebsiteConfig($key)
//     {
//         $config = WebsiteSetup::where('key', $key)->first();
//         if($config) {
//             return $config->value;
//         }
//         return null;
//     }

// }
if (!function_exists('hex2rgba')) {
    function hex2rgba($hex, $alpha = 1.0) {

        if (!$hex || !is_string($hex)) {
            return "rgba(0, 0, 0, $alpha)";
        }

        $hex = ltrim($hex, '#');
        if (strlen($hex) == 3) {
            $hex = "{$hex[0]}{$hex[0]}{$hex[1]}{$hex[1]}{$hex[2]}{$hex[2]}";
        }

        if (!preg_match('/^[a-fA-F0-9]{6}$/', $hex)) {
            return "rgba(0, 0, 0, $alpha)";
        }

        list($r, $g, $b) = [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2))
        ];

        return "rgba($r, $g, $b, $alpha)";
    }
}

if (! function_exists('isMobile')) {

    /**
     * Check if the user is using a mobile device.
     *
     * @return bool
     */
    function isMobile()
    {
        $useragent=$_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
            return true;
        } else {
            return false;
        }
    }
}
if(!function_exists('get_language_name')){
    function get_language_name($key)
    {
        $languages = array(
            "af" => "Afrikaans",
            "sq" => "Albanian - shqip",
            "am" => "Amharic - አማርኛ",
            "ar" => "Arabic - العربية",
            "an" => "Aragonese - aragonés",
            "hy" => "Armenian - հայերեն",
            "ast" => "Asturian - asturianu",
            "az" => "Azerbaijani - azərbaycan dili",
            "eu" => "Basque - euskara",
            "be" => "Belarusian - беларуская",
            "bn" => "Bengali - বাংলা",
            "bs" => "Bosnian - bosanski",
            "br" => "Breton - brezhoneg",
            "bg" => "Bulgarian - български",
            "ca" => "Catalan - català",
            "ckb" => "Central Kurdish - کوردی (دەستنوسی عەرەبی)",
            "zh" => "Chinese - 中文",
            "zh-HK" => "Chinese (Hong Kong) - 中文（香港）",
            "zh-CN" => "Chinese (Simplified) - 中文（简体）",
            "zh-TW" => "Chinese (Traditional) - 中文（繁體）",
            "co" => "Corsican",
            "hr" => "Croatian - hrvatski",
            "cs" => "Czech - čeština",
            "da" => "Danish - dansk",
            "nl" => "Dutch - Nederlands",
            "en" => "English",
            "en-AU" => "English (Australia)",
            "en-CA" => "English (Canada)",
            "en-IN" => "English (India)",
            "en-NZ" => "English (New Zealand)",
            "en-ZA" => "English (South Africa)",
            "en-GB" => "English (United Kingdom)",
            "en-US" => "English (United States)",
            "eo" => "Esperanto - esperanto",
            "et" => "Estonian - eesti",
            "fo" => "Faroese - føroyskt",
            "fil" => "Filipino",
            "fi" => "Finnish - suomi",
            "fr" => "French - français",
            "fr-CA" => "French (Canada) - français (Canada)",
            "fr-FR" => "French (France) - français (France)",
            "fr-CH" => "French (Switzerland) - français (Suisse)",
            "gl" => "Galician - galego",
            "ka" => "Georgian - ქართული",
            "de" => "German - Deutsch",
            "de-AT" => "German (Austria) - Deutsch (Österreich)",
            "de-DE" => "German (Germany) - Deutsch (Deutschland)",
            "de-LI" => "German (Liechtenstein) - Deutsch (Liechtenstein)",
            "de-CH" => "German (Switzerland) - Deutsch (Schweiz)",
            "el" => "Greek - Ελληνικά",
            "gn" => "Guarani",
            "gu" => "Gujarati - ગુજરાતી",
            "ha" => "Hausa",
            "haw" => "Hawaiian - ʻŌlelo Hawaiʻi",
            "he" => "Hebrew - עברית",
            "hi" => "Hindi - हिन्दी",
            "hu" => "Hungarian - magyar",
            "is" => "Icelandic - íslenska",
            "id" => "Indonesian - Indonesia",
            "ia" => "Interlingua",
            "ga" => "Irish - Gaeilge",
            "it" => "Italian - italiano",
            "it-IT" => "Italian (Italy) - italiano (Italia)",
            "it-CH" => "Italian (Switzerland) - italiano (Svizzera)",
            "ja" => "Japanese - 日本語",
            "kn" => "Kannada - ಕನ್ನಡ",
            "kk" => "Kazakh - қазақ тілі",
            "km" => "Khmer - ខ្មែរ",
            "ko" => "Korean - 한국어",
            "ku" => "Kurdish - Kurdî",
            "ky" => "Kyrgyz - кыргызча",
            "lo" => "Lao - ລາວ",
            "la" => "Latin",
            "lv" => "Latvian - latviešu",
            "ln" => "Lingala - lingála",
            "lt" => "Lithuanian - lietuvių",
            "mk" => "Macedonian - македонски",
            "ms" => "Malay - Bahasa Melayu",
            "ml" => "Malayalam - മലയാളം",
            "mt" => "Maltese - Malti",
            "mr" => "Marathi - मराठी",
            "mn" => "Mongolian - монгол",
            "ne" => "Nepali - नेपाली",
            "no" => "Norwegian - norsk",
            "nb" => "Norwegian Bokmål - norsk bokmål",
            "nn" => "Norwegian Nynorsk - nynorsk",
            "oc" => "Occitan",
            "or" => "Oriya - ଓଡ଼ିଆ",
            "om" => "Oromo - Oromoo",
            "ps" => "Pashto - پښتو",
            "fa" => "Persian - فارسی",
            "pl" => "Polish - polski",
            "pt" => "Portuguese - português",
            "pt-BR" => "Portuguese (Brazil) - português (Brasil)",
            "pt-PT" => "Portuguese (Portugal) - português (Portugal)",
            "pa" => "Punjabi - ਪੰਜਾਬੀ",
            "qu" => "Quechua",
            "ro" => "Romanian - română",
            "mo" => "Romanian (Moldova) - română (Moldova)",
            "rm" => "Romansh - rumantsch",
            "ru" => "Russian - русский",
            "gd" => "Scottish Gaelic",
            "sr" => "Serbian - српски",
            "sh" => "Serbo-Croatian - Srpskohrvatski",
            "sn" => "Shona - chiShona",
            "sd" => "Sindhi",
            "si" => "Sinhala - සිංහල",
            "sk" => "Slovak - slovenčina",
            "sl" => "Slovenian - slovenščina",
            "so" => "Somali - Soomaali",
            "st" => "Southern Sotho",
            "es" => "Spanish - español",
            "es-AR" => "Spanish (Argentina) - español (Argentina)",
            "esLA" => "Spanish (Latin America) - español (Latinoamérica)",
            "es-MX" => "Spanish (Mexico) - español (México)",
            "es-ES" => "Spanish (Spain) - español (España)",
            "es-US" => "Spanish (United States) - español (Estados Unidos)",
            "su" => "Sundanese",
            "sw" => "Swahili - Kiswahili",
            "sv" => "Swedish - svenska",
            "tg" => "Tajik - тоҷикӣ",
            "ta" => "Tamil - தமிழ்",
            "tt" => "Tatar",
            "te" => "Telugu - తెలుగు",
            "th" => "Thai - ไทย",
            "ti" => "Tigrinya - ትግርኛ",
            "to" => "Tongan - lea fakatonga",
            "tr" => "Turkish - Türkçe",
            "tk" => "Turkmen",
            "tw" => "Twi",
            "uk" => "Ukrainian - українська",
            "ur" => "Urdu - اردو",
            "ug" => "Uyghur",
            "uz" => "Uzbek - o‘zbek",
            "vi" => "Vietnamese - Tiếng Việt",
            "wa" => "Walloon - wa",
            "cy" => "Welsh - Cymraeg",
            "fy" => "Western Frisian",
            "xh" => "Xhosa",
            "yi" => "Yiddish",
            "yo" => "Yoruba - Èdè Yorùbá",
            "zu" => "Zulu - isiZulu",
        );
        return array_key_exists($key, $languages) ? $languages[$key] : $key;
    }
}
if (!function_exists('setEnvironmentValue')) {
    /**
     * @param $envKey
     * @param $envValue
     * @return string
     */

    function setEnvironmentValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $oldValue = env($envKey) !== null ? env($envKey) : '';

        // Check if the key exists in the file
        if (preg_match("/^{$envKey}=.*/m", $str)) {
            // Replace existing key with new value
            $str = preg_replace("/^{$envKey}=.*/m", "{$envKey}={$envValue}", $str);
        } else {
            $str .= "\n{$envKey}={$envValue}\n";
        }

        file_put_contents($envFile, $str);

        // Clear & Rebuild Cache
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:cache');

        return $envValue;
    }
}



