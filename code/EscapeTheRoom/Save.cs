using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EscapeTheRoom
{
    class Save
    {
        private static string path = "mentes.sav";

        static string[] file = File.ReadAllLines(path);

        public static void LoadGame()
        {
            string[] singleObject;
            Object targetObject;

            foreach (string line in file)
            {
                if (line.StartsWith("[object]"))
                {
                    singleObject = line.Split(';');

                    targetObject = LevelHandler.LookforObject(singleObject[1], 0);

                    targetObject.IsActive = LevelHandler.ToBool(singleObject[2]);
                    targetObject.Location = singleObject[3];
                }
                //else if (line.StartsWith("[player]")) ; //TODO PLAYER KEZELÉS
            }

        }

        public static void SaveGame()
        {
            List<string> lines = new List<string>();

            lines.Add("[obj-structure];name;isActive;location");
            lines.Add("[player-structure];location");

            // Tárgyak
            foreach (Object @object in LevelHandler.objects)
            {
                lines.Add(@object.ToExportString());
            }

            // Player data TODO
            lines.Add(Player.ToExportString());

            File.WriteAllLines(@"C:\Users\Bence\Desktop\mentes.sav", lines, Encoding.UTF8); //overwrite mentes.sav, TODO
            Console.WriteLine("Játék mentve.");
        }
    }
}
