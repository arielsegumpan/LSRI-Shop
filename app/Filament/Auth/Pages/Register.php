<?php

namespace App\Filament\Auth\Pages;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Pages\Page;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Group;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Profile')
                    ->icon('heroicon-o-user')
                    ->description('Tell us about yourself.')
                    ->schema([
                        Group::make([
                            TextInput::make('first_name')
                            ->label('First Name')
                            ->maxLength(255)
                            ->required(),

                            TextInput::make('last_name')
                            ->label('Last Name')
                            ->maxLength(255)
                            ->required(),
                        ])
                        ->columns([
                            'sm' => 1,
                            'md' => 2,
                            'lg' => 2
                        ]),
                    ]),

                    Step::make('Contact')
                    ->icon('heroicon-o-phone')
                    ->description('How can we reach you?')
                    ->schema([
                        TextInput::make('contact_number')
                            ->label('Contact Number')
                            ->maxLength(15)
                            ->nullable(),

                        TextInput::make('address_1')
                            ->label('Address Line 1')
                            ->maxLength(255)
                            ->nullable(),

                        TextInput::make('address_2')
                            ->label('Address Line 2')
                            ->maxLength(255)
                            ->nullable(),
                    ]),

                    Step::make('Account')
                    ->icon('heroicon-o-key')
                    ->description('Create your account.')
                    ->schema([
                        // Default Filament Fields
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                ])
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        $sanitizedData = $this->sanitizeInputData($data);

         $user = $this->createUser($sanitizedData);
         $this->assignUserProfileRole($user);

        return $user;
    }


    protected function sanitizeInputData(array $data): array
    {
        return [
            'first_name' => trim(strip_tags($data['first_name'])),
            'last_name' => trim(strip_tags($data['last_name'])),
            'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
            'password' => $data['password'],
            'contact_number' => isset($data['contact_number']) ? trim(strip_tags($data['contact_number'])) : null,
            'address_1' => isset($data['address_1']) ? trim(strip_tags($data['address_1'])) : null,
            'address_2' => isset($data['address_2']) ? trim(strip_tags($data['address_2'])) : null,
        ];
    }

    protected function createUser(array $data): User
    {
        return User::create([
            'name' => Str::title($data['first_name'] . ' ' . $data['last_name']),
            'email' => $data['email'],
            'password' => $data['password'],
            'contact_number' => $data['contact_number'] ?? null,
            'address_1' => $data['address_1'] ?? null,
            'address_2' => $data['address_2'] ?? null,
        ]);
    }

    protected function assignUserProfileRole(User $user): void
    {
        $userRole = Role::firstOrCreate(['name' => 'customer']);
        $user->assignRole($userRole);
    }


    public function getMaxWidth(): MaxWidth
    {
        return MaxWidth::FourExtraLarge; // This sets max-w-xl
    }
}
