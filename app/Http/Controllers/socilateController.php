<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class socilateController extends Controller
{
      // Les tableaux des providers autorisés
      protected $providers = [ "google", "github"];
     # redirection vers le provider
     public function redirect (Request $request) {

        $provider = $request->provider;
        

        
        // On vérifie si le provider est autorisé
        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect(); // On redirige vers le provider
        }
        abort(404); // Si le provider n'est pas autorisé
    }

    // Callback du provider
    public function callback (Request $request) {

        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {

        	// Les informations provenant du provider
        	$data = Socialite::driver($request->provider)->user();
            
            

            // Les informations de l'utilisateur
          /*
            $id = $data->getId();
            $name = $data->getNickname();
            $nickname = $data->getName();
            $email = $data->getEmail();
            $avatar = $data->getAvatar();
            */
           
              # Social login - register
              $email = $data->getEmail(); // L'adresse email
              $name = $data->getNickname() ?? $data->getName();
               // le nom
     
              $user = User::where("email", $email)->first();


            # 2. Si l'utilisateur existe
            if (isset($user)) {

                // Mise à jour des informations de l'utilisateur
                $user->name = $name;
                $user->save();

            # 3. Si l'utilisateur n'existe pas, on l'enregistre
            } else {
                
                // Enregistrement de l'utilisateur
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt("emilie") // On attribue un mot de passe
                ]);
            }

            # 4. On connecte l'utilisateur
            auth()->login($user);

            # 5. On redirige l'utilisateur vers /home
            if (auth()->check()) return redirect(route('dashboard'));

         }

         }
        
    }

