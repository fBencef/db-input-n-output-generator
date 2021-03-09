using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EscapeTheRoom
{
    class InputHandler
    {
        //TODO
        /*input feldolgozása:
         *  tárgyak és akciók megkülönböztetése
         *  egymással való működésük megállapítása (ajtó kulcs - ablak kulcs)
         *  sorrend?
         *  hibakezelés (külön osztály?)
         */
        public static string[] actions = { "menj", "nézd", "vedd fel", "tedd le", "niysd", "húzd", "törd" };

        public void Sort(string rawInput)
        {
            
        }

        /*private string GetAllActions()
        {
            foreach (var item in LevelHandler.actions)
            {
                return item;
            }

            return null;
        }*/
    }
}
