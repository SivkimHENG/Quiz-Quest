<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CreateQuestionResource\Pages;
use App\Filament\Resources\CreateQuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Checkbox;
use App\Filament\Resources\relationship;
use App\Filament\Resources\validate;



class CreateQuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->label('Title')
                ->required()
                ->maxLength(255),

            TextInput::make('question')
                ->label('Question')
                ->required()
                ->default('Question')
                ->maxLength(255),

            Repeater::make('answers')
                ->label('Answers')
                ->schema([
                    TextInput::make('answer')
                        ->label('Answer Text')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Enter an answer'),

                    Checkbox::make('correct_answer')
                        ->label('Correct Answer')
                        ->helperText('Check if this is the correct answer.'),
                ])
                ->minItems(2)
                ->maxItems(4)
                ->helperText('Add answers for the question, and mark one as correct.')
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Title'),
                Tables\Columns\TextColumn::make('question')->label('Question'),
                Tables\Columns\TextColumn::make('answers_count')->label('Number of Answers'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCreateQuestions::route('/'),
            'create' => Pages\CreateCreateQuestion::route('/create'),
            'edit' => Pages\EditCreateQuestion::route('/{record}/edit'),
        ];
    }
}
