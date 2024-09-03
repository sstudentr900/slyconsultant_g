<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institutions extends Model {
    //資料表名稱
    protected $table = 'institutions';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'state',
      'name',
    ];
}
?>