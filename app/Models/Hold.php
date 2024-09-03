<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hold extends Model {
    //資料表名稱
    protected $table = 'hold';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'institutions_id',
      'clinic_id',
      'doctor_id',
      'date',
      'time',
      'state',
    ];
}
?>