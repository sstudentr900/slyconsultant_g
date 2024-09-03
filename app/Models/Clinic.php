<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model {
    //資料表名稱
    protected $table = 'clinic';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'institutions_id',
      'name',
      'state',
    ];
}
?>