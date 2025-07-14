namespace App\Http\Controllers;

use App\Models\Category;

class StoreController extends Controller
{
    public function index()
    {
        // جلب جميع التصنيفات مع منتجاتها النشطة فقط
        $categories = Category::where('is_active', true)
            ->with(['products' => function($q) {
                $q->where('is_active', true);
            }])->get();

        return view('store.index', compact('categories'));
    }
}
