<x-tests.app>
    <x-slot name="header">ヘッダー1</x-slot>
    コンポーネントテスト1
    <x-tests.card title="タイトル1" content="本文1" :message="$message" /><!-- 変数の値を渡す場合は【:属性名="変数"】で渡さないと変数の値が展開されず変数名がそのまま表示される -->
    <x-tests.card title="タイトル2" />
</x-tests.app>