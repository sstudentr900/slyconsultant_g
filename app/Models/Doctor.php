<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {
    //資料表名稱
    protected $table = 'doctor';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'state',
      'name',
      'institutions_id',
    ];
}
?>