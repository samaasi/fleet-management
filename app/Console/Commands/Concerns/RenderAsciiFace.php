<?php

namespace App\Console\Commands\Concerns;

use Illuminate\Console\Command;

trait RenderAsciiFace
{
    public function drawFace(): void
    {
        $this->newLine();
        $this->line(<<<EOT
            <fg=red> &&&&&&&&&&&&%(/(##%%##%%%%%%%%%###%%%%&&
            <fg=red> &&&&&&&#%%#((((((((((//#%##(%#(###((%&&&
            <fg=red> &&&&&%%%%######(((((////*//*////((##&&&&
            <fg=red> &&&&%%%%%###(//((((((((//*****///((##%%&
            <fg=red> &&&&&&%%%#(/(##((((((((((/*******///(((#
            <fg=red> &&&&&&&&<fg=yellow>%#((#&%(<fg=blue>***/((((((/(///****////(
            <fg=red> &%@&&&&&@%#(((((((###((((((/////*****///
            <fg=red> &&&&%#(#&&#((((#####(((((((//#&(****////
            <fg=red> &&&/#%#%&%##(((//(#(((((((///******/*/((
            <fg=red> &%%&&&&&&##(///(((((((///////********(/(
            <fg=red> &%%%&@@&%&&##(////(((((//////********/((
            <fg=red> &&&&&&&&&&%((*((//////////////*****//((#
            <fg=red> %&&&%%%%&%&&%%#(((((///////////*****(###
            <fg=red> &&&&&%%%%%%%&&&&%#(((////////////////###
            <fg=red> &&&&&&&&%%##%%%%##(((////////////////%%%
            <fg=red> &&&&&&&&&&%&%#%#%%%%%%##((///////////&%%
            <fg=red> &&&&&&&&&&&&&&(%%%%%%%%###((/////(((#%%%
            <fg=red> &&&&&&&&&&&&@(#%%%%%%%%%####(((#####&%%%
            <fg=red> &&&&&&&&@@&&@@((%%%&&%%%%%%##%%%%%%&%%%%
            <fg=red> &&&&&@@&&%%&&&@((#%%%%%%%%%%%%%%%%%%%%%%
            <fg=red> &&&@@@&&&&%%%%&@%((##%%%%%%%%%%&%%%%%%%%
            <fg=red> &&@@@@@@&%&%%%%&@@@&(((####&%%%%%%%%&%%%
        EOT);
        $this->newLine();
    }
}
