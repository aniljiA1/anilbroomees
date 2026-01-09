// app/Models/User.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $keyType = 'string'; // if using UUIDs
    public $incrementing = false;  // UUIDs are not auto-increment
    protected $fillable = [
        'id', 'username', 'age', 'reputationScore', 'version'
    ];
}
