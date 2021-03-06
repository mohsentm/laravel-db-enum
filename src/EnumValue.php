<?php
namespace Mohsentm;
/**
 * User: mohsen hosseini
 * Email: hosseini.m1370@gmail.com
 * Date: 11/12/18
 * Time: 13:11
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

trait EnumValue
{
    public static function getEnumValues()
    {
      return  Cache::remember(
          'enum_'.config('database.connections.' . (new static)->connection . '.prefix') . (new static)->getTable()
          , 60, function() {
            $fields = DB::connection((new static)->connection)->select(
                DB::raw("SHOW COLUMNS FROM " . config('database.connections.' . (new static)->connection . '.prefix') . (new static)->getTable())
            );
            $result = [];
            foreach ($fields as $field) {
                $enum = self::parsEnumValues($field->Type);
                if (!empty($enum))
                    $result[$field->Field] = $enum;
            }
            return $result;
        }
      );
    }

    private static function parsEnumValues($type)
    {
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        if (empty($matches))
            return null;

        foreach (explode(',', $matches[1]) as $value) {
            $enum[] = trim($value, "'");
        }
        return $enum;
    }
}

