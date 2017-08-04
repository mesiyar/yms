<?php
/**
 * Created by PhpStorm.
 * User: luo
 * Date: 17-8-4
 * Time: 下午5:15
 */
namespace common\helpers;

use Yii;
use yii\base\ErrorException;

class FileHelper extends \yii\helpers\FileHelper
{

    /**
     * 文件日志
     * 日志文件 ./log/date('Y-m-d').log
     * 日志内容 时间 访问者 ip 方法 消息
     * @param $message
     * @param $method
     */
    public static function setLog($message, $method)
    {
        $logDir = isset(Yii::$app->params['logDir']) ? Yii::$app->params['logDir'] : './log/';
        $logFile = date('Y-m-d').'.log';
        $targetFile = $logDir.'/'.$logFile;
        if(!is_dir($logDir)) {
            @mkdir($logDir);
        }
        // 日志内容
        $content = date('Y-m-d H:i:s').' '.Yii::$app->user->identity->username.' '.$_SERVER['REMOTE_ADDR'].' '. $method. ' '. $message. "\n";
        if(!file_exists($targetFile)) {
            file_put_contents($targetFile, $content);
        } else {
            $hl = fopen($targetFile, 'a');
            fwrite($hl, $content);
            fclose($hl);
        }
    }

    /**
     * 清除缓存静态方法
     * @param $dir
     * @param array $options
     * @throws ErrorException
     */
    public static function clearDirectory($dir, $options = []) {
        if (!is_dir($dir)) {
            return;
        }
        if (isset($options['traverseSymlinks']) && $options['traverseSymlinks'] || !is_link($dir)) {
            if (!($handle = opendir($dir))) {
                return;
            }
            while (($file = readdir($handle)) !== false) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                $path = $dir . DIRECTORY_SEPARATOR . $file;
                if (is_dir($path)) {
                    static::removeDirectory($path, $options);
                } else {
                    try {
                        unlink($path);
                    } catch (ErrorException $e) {
                        if (DIRECTORY_SEPARATOR === '\\') {
                            // last resort measure for Windows
                            $lines = [];
                            exec("DEL /F/Q \"$path\"", $lines, $deleteError);
                        } else {
                            throw $e;
                        }
                    }
                }
            }
            closedir($handle);
        }
    }
}