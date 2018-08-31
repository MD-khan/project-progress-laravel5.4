<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

protected $fillable = [
        'project_name', 'category', 'site-manager', 'site_manager', 'developers', 'designers', 'clients'
    ];


    public function category()
    {
    	return $this->belongsTo( ProjectCategory:: class );
    }


//project  create by
public function user()
{
	return $this->belongsTo( User::class);
}


// Project team and clients
public function participants()
{
	return $this->belongsToMany(User::class);
}


public function corporateParticipants()
{
    $results = array();
    foreach ($this->participants as $participant) {
          if( ! $participant->hasRole('client') )
            $results[] = $participant;
    }
    return $results;
}


public function  clients()
{
  
}

// Get project  participents by their role
public function  participantsByRole( $name )
{
      $results = array();
     foreach ( $this->participants as $participant ) { 
  foreach ($participant->roles as $role) { 
       if( $participant->hasRole($name) ){
                        $results[] = $participant;
                  }
   }
        }
      return $results;
}




// Chek an user including project creator  is belongs to a project 
  public function isBelonsTo(  User $user )
  {
      $results = [ $user->id  => $this->user->id ];
      foreach ( $this->participants as $participant ) {  
        $results[] = $participant->id;
      }

      return ( in_array($user->id, $results) );

  }



//Deal Price 
public function dealPrice()
{
	return $this->deal_price;
}

// Total amount spent 
public function totalAmountSpent()
{
	$total = $this->planing_cost + $this->other_cost + $this->design_cost + $this->develop_cost;
           return $total;
}

// Total revenue
public function revenue()
{
	$revenue = $this->dealPrice() - $this->totalAmountSpent();
	return $revenue;
}


//  All project tasks  project tasks
public function  tasks()
{
   return $this->hasMany( Task::class);
}

}