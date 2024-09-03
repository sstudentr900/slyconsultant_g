<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchaser extends Model {
    //資料表名稱
    protected $table = 'purchaser';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'username',
      'phone',
      'city',
      'township',
      'address',
      'email',
      'remark',
      'casenumber',
      'releases',
    ];
}
?>