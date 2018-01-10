<?php

namespace Corp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'name', 'secondname', 'email', 'password','phone', 'address','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany('Corp\Models\Order','user_id','id');
    }

    public function roles()
    {
     return $this->belongsToMany('Corp\Models\Role');

    }





    public function countData($orders, $priznak=0)  // $priznak=0 запрос get ,$priznak=1 запрос post
    {
        $timeDay=Carbon::now();
        // $timeDay= $timeDay->toDateString();
        $timeDay= $timeDay->timestamp/86400; // количество дней
        $timeDay=explode('.',$timeDay);
        $qntDay=[0,0,0,0,0]; $worked=[0,0,0,0];
        $turnOver=0;
        if($orders) {
            foreach($orders as $order)
            {
                $dt = Carbon::parse($order->created_at);
                $dst =$dt->timestamp/86400; // количество дней
                $dst=explode('.',$dst);

                // за текущий день
                if($timeDay[0]== $dst[0])
                {
                    $qntDay[0]++;
                    if($priznak==1)
                    {
                        if($order->status)
                        {
                            $turnOver+=$order->sum;
                        }
                    } else {
                        $turnOver+=$order->sum;
                    }
                }
                // за неделю

                if ($dst[0]<=$timeDay[0]-1 && $dst[0]>=$timeDay[0]-7)
                {
                    $qntDay[1]++;
                    if($priznak==1)
                    {
                        if($order->status)
                        {
                            $turnOver+=$order->sum;
                        }
                    } else {
                        $turnOver+=$order->sum;
                    }
                }
                //за текущий месяц
                elseif ($dst[0]<=$timeDay[0]-8 && $dst[0]>=$timeDay[0]-30)
                {
                    $qntDay[2]++;
                    if($priznak==1)
                    {
                        if($order->status)
                        {
                            $turnOver+=$order->sum;
                        }
                    } else {
                        $turnOver+=$order->sum;
                    }
                }
                // за три месяца
                elseif ($dst[0]<=$timeDay[0]-7 && $dst[0]>=$timeDay[0]-90 )
                {
                    $qntDay[3]++;
                    $turnOver+=$order->sum;
                }
                // за год
                elseif($dst[0]<=$timeDay[0]-90 && $dst[0]>=$timeDay[0]-360)
                {
                    $qntDay[4]++;
                    $turnOver+=$order->sum;
                }
                if($order->status==NULL)
                {
                    $worked[0]++;
                }
                if($order->status==1)
                {
                    $worked[1]++;
                }
                if($order->status==2)
                {
                    $worked[2]++;
                }
                if($order->status==3)
                {
                    $worked[3]++;
                }

            }
        }
        $data=[
            'qntDay'=> $qntDay,
            'worked'=>$worked,
            'turnOver'=>$turnOver

        ];
        return $data;
    }



}
