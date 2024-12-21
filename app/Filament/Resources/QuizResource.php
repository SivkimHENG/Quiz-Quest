<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Models\Answer;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

use function Laravel\Prompts\textarea;

class QuizResource extends Resource
{
    protected static ?string $model = Question::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $model_answer = Answer::class;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Repeater::make('answers')
                    ->label('Answer Options')
                    ->relationship('answers')
                    ->schema([
                        Forms\Components\TextInput::make('answer')
                            ->label('Answer Text')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Checkbox::make('correct_answer')
                            ->label('Mark as Correct Answer')->default(false)

                    ])
                    ->required()
                    ->minItems(2) // Require at least two answer options
                    ->maxItems(4) // Limit to a maximum of four options
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title")
                    ->sortable()
                    ->searchable(),
                TextColumn::make('correct_answer')
                    ->label('Answers')
            ])
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
        ];
    }
}
