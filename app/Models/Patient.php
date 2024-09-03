<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {
    //資料表名稱
    protected $table = 'patient';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'name',
      'phone',
      'semaphore',
      'birthday',
      'state',
    ];
}
?>