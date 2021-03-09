using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EscapeTheRoom
{
    class Program
    {
        static void Main(string[] args)
        {
            LevelHandler.GenerateLevel();

            Save.LoadGame();

            Save.SaveGame();
        }

        private static void DebugLists()
        {
            foreach (var item in LevelHandler.objects)
            {
                Console.WriteLine(item.Name + item.IsActive + item.IsObtainable + item.ActivatedBy);
            }
            foreach (var item in LevelHandler.rooms)
            {
                Console.WriteLine(item.Name);
            }
        }

    }
}
