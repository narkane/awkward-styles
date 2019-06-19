<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class ArtworkManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user_id = Auth::user()->id;
        //$artworks = DB::SELECT('select id,artname,artwork from tbl_art_work where id not in (select artwork_id from tbl_artwork_status) order by id DESC LIMIT 25');
        $artworks = DB::SELECT('select ta.id,ta.artname,ta.artwork,ts.id as loadmore from tbl_art_work ta join tbl_artwork_status ts ON ts.artwork_id=ta.id where ts.is_pending=? LIMIT 15',[1]);
        return view('artworkmanagement',['artworks'=>$artworks]);
    }

    public function updateStatus(Request $request) {
    	$id = $request->id;
    	$status = $request->status;
    	$reason = $request->reason;
    	$accepted = 0;
    	$rejected = 0;
    	$pending = 0;

    	if($status == 'accepted') { $accepted=1; } else { $rejected=1; }
    	$if_exist = DB::SELECT('select id from tbl_artwork_status where artwork_id=?',[$id]);
    	if(count($if_exist)>0) {
    		$status_updated = DB::update('update tbl_artwork_status set is_accepted=?,is_rejected=?,is_pending=?,reason=?,mtime=? where artwork_id=?',[$accepted,$rejected,$pending,$reason,now(),$id]);
    		if($status_updated) {
    			echo 'success';
    		} else {
    			echo 'error';
    		}
    	} else {
    		$status_saved = DB::insert('insert into tbl_artwork_status(artwork_id,is_accepted,is_rejected,is_pending,reason,ctime,mtime) VALUES (?,?,?,?,?,?,?)',[$id,$accepted,$rejected,$pending,$reason,now(),now()]);
    		if($status_saved) {
    			echo 'success';
    		} else {
    			echo 'error';
    		}
    	}
    }

    public function loadMore(Request $request) {
        $id = $request->id;
        $artworks = DB::SELECT('select ta.id,ta.artname,ta.artwork,ts.id as loadmore from tbl_art_work ta join tbl_artwork_status ts ON ts.artwork_id=ta.id where ts.is_pending=? and ts.id > ? LIMIT 15',[1,$id]);
        if(count($artworks)>0) {
            foreach($artworks as $artwork) {
            ?>
            <tr id="row_<?php echo $artwork->id; ?>">
<td>
<img src="<?php echo $artwork->artwork; ?>" width="90">
</td>
<td>
<?php echo $artwork->artname; ?>
</td>
<td>
<input type="radio" name="artwork_status_<?php echo $artwork->id; ?>" id="artwork_status_accept_<?php echo $artwork->id; ?>" value="accepted" onclick="checkEvent('<?php echo $artwork->id; ?>','accept')" required>
</td>
<td>
<input type="radio" name="artwork_status_<?php echo $artwork->id; ?>" id="artwork_status_reject_<?php echo $artwork->id; ?>" value="rejected" onclick="checkEvent('<?php echo $artwork->id; ?>','reject')" required>
</td>
<td>
<textarea rows="4" cols="20" name="reason_<?php echo $artwork->id; ?>" id="reason_<?php echo $artwork->id; ?>" disabled></textarea>
</td>
<td id="<?php echo $artwork->loadmore; ?>">
<button class="btn btn-primary" id="button_<?php echo $artwork->id; ?>" onclick="saveStatus('<?php echo $artwork->id; ?>')" disabled>Save</button>
</td>
</tr>
            <?php    
            }
        } else {
            echo 'nodata';
        }

    }
}