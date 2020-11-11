    public static function CutStr($str, $lenght) {
        // Проверяем длину строки. Если меньше необходимого возвращаем по умолчанию
        $str=strip_tags($str);
        if (mb_strlen($str)<=$lenght) {
            return $str;
        }
        // обрезаем строку
        $str = mb_substr($str, 0, $lenght);
        // проверяем не кончаеться ли на , или !
        $str = rtrim($str, "!,.-");
        // находим последний пробел и обрезаем по нему
        $str = mb_substr($str, 0, mb_strrpos($str, ' '));
        // добавляем многоточие
        return $str.='...';
    }
