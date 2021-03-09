using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace EscapeTheRoom
{
    class LevelHandler
    {
        public static List<Room> rooms = new List<Room>();
        public static List<Object> objects = new List<Object>();
        public static Player player = new Player();

        public static void GenerateLevel()
        {
            LoadRooms("Rooms.csv");
            LoadObjects("Objects.csv");
        }


        private static void LoadRooms(string path)
        {
            string[] file = File.ReadAllLines(path);
            foreach (string line in file)
            {
                rooms.Add(new Room(line));
            }
        }
        private static void LoadObjects(string path)
        {
            string[] file = File.ReadAllLines(path);
            foreach (string line in file)
            {
                string[] row = line.Split(';');
                objects.Add(new Object(row[0], ToBool(row[1]), ToBool(row[2]), row[3], row[4]));
            }
        }

        private static void PlaceObjects()
        {
            foreach (Object element in objects)
            {

            }
        }

        public static Room LookforRoom(string roomName)
        {
            return rooms.Find(x => x.GetName() == roomName);
        }
        /*public static Object LookforObjectName(string objectName)
        {
            return objects.Find(x => x.GetName() == objectName);
        }*/
        public static Object LookforObject(string value, int type) //0 = name, 1 = initial location
        {
            if (type == 1) return objects.Find(x => x.GetLocation() == value);
            else return objects.Find(x => x.GetName() == value);
        }

        public static bool ToBool(string text)
        {
            if (text == "true") return true;
            else return false;
        }


    }
}
