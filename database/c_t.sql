CREATE TABLE `t_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '主题',
  `desc` varchar(50) NOT NULL COMMENT '描述',
  `activityTime` datetime NOT NULL COMMENT '活动开始时间',
  `createTime` datetime NOT NULL COMMENT '创建时间',
  `creator` smallint(6) NOT NULL COMMENT '创建人',
  `status` tinyint(1) NOT NULL COMMENT '状态 0 过期 1 有效',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='活动表';
