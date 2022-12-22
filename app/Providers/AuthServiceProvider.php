<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject("Verificar tu cuenta, La Esmeralda")
                ->line("Tu cuenta ya casi está lista, solo falta que presiones en el enlace de abajo y tu cuenta estara verificada y podras hacer uso de la plataforma")
                ->action("Confirmar tu Cuenta", $url)
                ->line("Si no has creado esta cuenta procede a ignorar este mensaje :)");
        });
    }
}
