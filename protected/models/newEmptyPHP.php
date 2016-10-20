

SQL SECURITY DEFINER VIEW `vw_solpeparacomprar` AS select `a`.`escompra` AS `escompra`,
`b`.`textodetalle` AS `textodetalle`,`a`.`numero` AS `numero`,`a`.`estado` AS `estado`,
`b`.`item` AS `item`,`b`.`id` AS `id`,`b`.`est` AS `est`,`b`.`tipimputacion` AS `tipimputacion`,
`b`.`punitplan` AS `punitplan`,`a`.`id` AS `identidad`,`b`.`fechaent` AS `fechaent`,
`b`.`fechacrea` AS `fechacrea`,`b`.`usuario` AS `usuario`,`b`.`um` AS `um`,
`b`.`tipsolpe` AS `tipsolpe`,`b`.`centro` AS `centro`,`b`.`codal` AS `codal`,
`b`.`codart` AS `codart`,`b`.`imputacion` AS `imputacion`,`b`.`cant` AS `cant`,
`d`.`desum` AS `desum`,`b`.`txtmaterial` AS `txtmaterial`,sum(`c`.`cant`) AS `cantatendida`,
(`b`.`cant` - sum(`c`.`cant`)) AS `cant_pendiente`
from (((`public_solpe` `a` join `public_desolpe` `b` 
on((`a`.`id` = `b`.`hidsolpe`))) left join `public_desolpecompra` `c` 
on((`b`.`id` = `c`.`iddesolpe`))) join `public_ums` `d` 
on((`d`.`um` = `b`.`um`))) where (`a`.`escompra` = '1' or 
`a`.`escompra` = 'S') group by
`a`.`escompra`,`a`.`numero`,`a`.`fechanec`,`b`.`centro`,`b`.`txtmaterial`,
`b`.`codal`,`b`.`codart`,`b`.`imputacion`,`b`.`cant`,`d`.`desum` 
having ((sum(`c`.`cant`) < `cant`) or isnull(sum(`c`.`cant`)));

