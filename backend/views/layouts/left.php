<aside class="main-sidebar">

    <section class="sidebar">

        <?php
        $callback = function($menu){
            $data = json_decode($menu['data'], true);
            $items = $menu['children'];
            $return = [
                'label' => $menu['name'],
                'url' => [$menu['route']],
            ];
            //处理我们的配置
            if ($data['icon']) {
                $return['icon'] = $data['icon'];
            } else {
                $return['icon'] = 'fa fa-circle-o';
            }
            //没配置图标的显示默认图标
            (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'fa fa-circle-o';
            $items && $return['items'] = $items;
            return $return;
        };
        //这里我们对一开始写的菜单menu进行了优化
        $items = \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);

        echo dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items' => $items,
        ]  ); ?>

    </section>

</aside>
