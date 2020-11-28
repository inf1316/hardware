using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Management;
using System.Management.Instrumentation;
using System.Windows.Forms;
using System.Data;
using Npgsql;
using NpgsqlTypes;

namespace hardware
{
    /// <summary>
    /// @ Autor: Jose Manuel Mclanghlin Matienzo
    /// @ Estudiante Ing. Informatica 4to año Cienfuegos,Cuba
    /// </summary>
    class Program
    {
        /// <summary>
        /// Muestra las opciones al usuario para que escoga la de su preferencia
        /// </summary>
        /// <returns>Opcion elegida por el usuario</returns>
        static int getOpcion()
        {
            Console.Clear();
            Console.WriteLine("Hardware Information/Registrer.");
            Console.WriteLine("Departamento de Administración de Redes: Universidad de Ciencias Medicas De Cienfuegos.");

            Console.WriteLine(" ");
            Console.WriteLine("1-Muestra información del Mouse.");
            Console.WriteLine("2-Muestra información del Monitor.");
            Console.WriteLine("3-Muestra información de la Cpu.");
            Console.WriteLine("4-Muestra información del Sonido.");
            Console.WriteLine("5-Muestra información del Teclado.");
            Console.WriteLine("6-Muestra información del Disco.");
            Console.WriteLine("7-Muestra información del Sistema.");
            Console.WriteLine("8-Muestra información de la Memoria.");
            Console.WriteLine("9-Muestra información del Bios.");
            Console.WriteLine("10-Muestra informacion del Board.");
            Console.WriteLine("11-Muestra información de la Tarjeta de Red.");
            Console.WriteLine("12-Muestra información de CDROM.");
            Console.WriteLine("13-Guardar en Base de Datos");            
            Console.WriteLine("14-Login");
            Console.WriteLine("0-Salir.");
            Console.Write("Presione la opción:");
            return int.Parse(Console.ReadLine());
        }

        /// <summary>
        /// Main del programa
        /// </summary>
        /// <param name="args"></param>
        static void Main(string[] args)
        {         
            int opcion = -1;
            do
            {
                try
                {
                    opcion = getOpcion();
                    switch (opcion)
                    {
                        case 0: { break; }
                        case 1:
                            {
                                Console.WriteLine("Mouse:");
                                StringBuilder manufacturer = Mouse.manufacturer();
                                Console.WriteLine(" " + manufacturer);

                                StringBuilder caption = Mouse.caption();
                                Console.WriteLine(" " + caption);

                                StringBuilder deviceID = Mouse.deviceID();
                                Console.WriteLine(" " + deviceID);

                                Console.WriteLine(" Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 2:
                            {
                                Console.WriteLine("Monitor:");

                                StringBuilder monitorType = Monitor.monitorType();
                                Console.WriteLine(" " + monitorType);

                                StringBuilder deviceID = Monitor.deviceID();
                                Console.WriteLine(" " + deviceID);

                                StringBuilder monitorManufacturer = Monitor.monitorManufacturer();
                                Console.WriteLine(" " + monitorManufacturer);

                                Console.WriteLine("Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 3:
                            {
                                Console.WriteLine("Cpu:");

                                StringBuilder GetCPUManufacturer = Cpu.GetCPUManufacturer();
                                Console.WriteLine(" " + GetCPUManufacturer);

                                StringBuilder getCpuDetails = Cpu.getCpuDetails();
                                Console.WriteLine(" " + getCpuDetails);

                                StringBuilder serialNumber = Cpu.serialNumber();
                                Console.WriteLine(" " + serialNumber);

                                Console.WriteLine("Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 4:
                            {
                                Console.WriteLine("Sonido:");

                                StringBuilder manufacturer = Sonido.manufacturer();
                                Console.WriteLine(" " + manufacturer);

                                StringBuilder description = Sonido.description();
                                Console.WriteLine(" " + description);

                                StringBuilder deviceID = Sonido.deviceID();
                                Console.WriteLine(" " + deviceID);

                                Console.WriteLine("Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 5:
                            {
                                Console.WriteLine("Teclado:");

                                StringBuilder description = Teclado.description();
                                Console.WriteLine(" " + description);

                                StringBuilder deviceID = Teclado.deviceID();
                                Console.WriteLine(" " + deviceID);

                                Console.WriteLine("Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 6:
                            {
                                Console.WriteLine("Disco:");
                                foreach (var item in Disco.model()) Console.WriteLine(" " + string.Format("Modelo: {0}", item));
                                foreach (var item in Disco.GetHDDSerialNo()) { if (!string.IsNullOrEmpty(item)) Console.WriteLine(" " + string.Format("Numero de serie: {0}", (string)item.Trim())); }

                                Console.WriteLine("Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 7:
                            {
                                Console.WriteLine("Sistema:");

                                StringBuilder GetComputerName = Sistema.GetComputerName();
                                Console.WriteLine(" " + GetComputerName);

                                StringBuilder GetOSInformation = Sistema.GetOSInformation();
                                Console.WriteLine(" " + GetOSInformation);

                                StringBuilder serialNumber = Sistema.serialNumber();
                                Console.WriteLine(" " + serialNumber);

                                Console.WriteLine("Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 8:
                            {
                                Console.WriteLine("Memoria:");

                                StringBuilder GetPhysicalMemory = Memory.GetPhysicalMemory();
                                Console.WriteLine(" " + GetPhysicalMemory);

                                StringBuilder GetNoRamSlots = Memory.GetNoRamSlots();
                                Console.WriteLine(" " + GetNoRamSlots);

                                foreach (var item in Memory.manufacturer()) Console.WriteLine(" " + string.Format("Modelo: {0}", item));
                                foreach (var item in Memory.serialNumber()) Console.WriteLine(" " + string.Format("Numero de serie: {0}", item));

                                Console.WriteLine("Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 9:
                            {
                                Console.WriteLine("Bios:");

                                StringBuilder manufacturer = Bios.manufacturer();
                                Console.WriteLine(" " + manufacturer);

                                StringBuilder version = Bios.version();
                                Console.WriteLine(" " + version);

                                StringBuilder GetBIOSserNo = Bios.GetBIOSserNo();
                                Console.WriteLine(" " + GetBIOSserNo);

                                Console.WriteLine("Presione una tecla para continuar...");
                                Console.ReadKey();
                            }
                            break;

                        case 10:
                            {
                                Console.WriteLine("Board:");

                                Console.WriteLine(" " + Board.manufacturer());
                                Console.WriteLine(" " + Board.serialNumber());
                                Console.ReadKey();
                            }
                            break;

                        case 11:
                            {
                                Console.WriteLine("Tarjeta de Red:");

                                Console.WriteLine(" " + Red.manufacturer());
                                Console.WriteLine(" " + Red.mac());
                                Console.WriteLine(" " + Red.deviceID());
                                Console.ReadKey();
                            }
                            break;

                        case 12:
                            {
                                Console.WriteLine("CDROM:");

                                Console.WriteLine(" " + CD.manufacturer());
                                Console.WriteLine(" " + CD.deviceID());
                                Console.ReadKey();
                            }
                            break;

                        case 13:
                            {

                            }
                            break;
                        default: Console.WriteLine("Opción inexistente...");
                            break;
                    }
                }
                catch (Exception ex)
                {
                    string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                    Console.WriteLine(error);
                }

            } while (opcion != 0);
        }

        /// <summary>
        /// Clase que permite obtener informacion del CD
        /// </summary>
        public class CD
        {
            /// <summary>
            /// Obtiene el id de dispositivo CDROM
            /// </summary>
            /// <returns>id de dispositivo</returns>
            public static StringBuilder deviceID()
            {
                StringBuilder result = new StringBuilder();

                string con = string.Empty;
                using (ManagementClass management = new ManagementClass("Win32_CDROMDrive"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["DeviceID"].Value) + " ";
                            break;
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("CD Serial Number: {0}", con));
            }


            /// <summary>
            /// Obtiene el fabricante del CDROM
            /// </summary>
            /// <returns>fabricante</returns>
            public static StringBuilder manufacturer()
            {
                StringBuilder result = new StringBuilder();

                string con = string.Empty;
                using (ManagementClass management = new ManagementClass("Win32_CDROMDrive"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["Manufacturer"].Value) + " ";
                            break;
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("CD fabricante: {0}", con));
            }           
        }

        /// <summary>
        /// Clase que permite obtener informacion de la tarjeta de red
        /// </summary>
        public class Red 
        {
            /// <summary>
            /// Obtiene la mac de la tarjeta de red
            /// </summary>
            /// <returns>mac</returns>
            public static StringBuilder mac()
            {
                StringBuilder result = new StringBuilder();
                string con = string.Empty;

                ManagementObjectSearcher management = new ManagementObjectSearcher("select * from Win32_NetworkAdapter where Name='Realtek PCIe FE Family Controller'");
                ManagementObjectCollection moc = management.Get();
                if (moc.Count > 0)
                {
                    foreach (ManagementObject mo in moc)
                    {
                        con += (string)mo["MACAddress"];
                        break;
                    }
                }
                return result.Append(string.Format("Mac de la tarjeta de red: {0}", con));
            }

            /// <summary>
            /// Obtiene el fabricante de la tarjeta de red
            /// </summary>
            /// <returns>fabricante</returns>
            public static StringBuilder manufacturer()
            {
                StringBuilder result = new StringBuilder();
                string con = string.Empty;

                ManagementObjectSearcher management = new ManagementObjectSearcher("select * from Win32_NetworkAdapter where Name='Realtek PCIe FE Family Controller'");
                ManagementObjectCollection moc = management.Get();
                if (moc.Count > 0) foreach (ManagementObject mo in moc) { con += (string)mo["Manufacturer"]; break; }                                                   
                return result.Append(string.Format("Fabricante de la tarjeta de red: {0}", con));
            }

            /// <summary>
            /// Devuelve el identificador de la tarjeta de red
            /// </summary>
            /// <returns>identificador</returns>
            public static StringBuilder deviceID()
            {
                StringBuilder result = new StringBuilder();
                string con = string.Empty;

                ManagementObjectSearcher management = new ManagementObjectSearcher("select * from Win32_NetworkAdapter where Name='Realtek PCIe FE Family Controller'");
                ManagementObjectCollection moc = management.Get();
                if (moc.Count > 0) foreach (ManagementObject mo in moc) { con += (string)mo["PNPDeviceID"]; break; }
                return result.Append(string.Format("ID de la tarjeta de red: {0}", con));
            }
        }

        /// <summary>
        /// Clase que permite obtener informacion de la placa base
        /// </summary>
        public class Board
        {
            /// <summary>
            /// Obtiene el numero de serie del board
            /// </summary>
            /// <returns>numero de serie del board</returns>
            public static StringBuilder serialNumber()
            {
                StringBuilder result = new StringBuilder();

                string con = string.Empty;
                using (ManagementClass management = new ManagementClass("Win32_BaseBoard"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["SerialNumber"].Value) + " ";
                            break;
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("Board Serial Number: {0}", con));
            }

            /// <summary>
            /// Fabricante del board
            /// </summary>
            /// <returns>fabricante del board</returns>
            public static StringBuilder manufacturer()
            {
                StringBuilder result = new StringBuilder();

                string con = string.Empty;
                using (ManagementClass management = new ManagementClass("Win32_BaseBoard"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["Manufacturer"].Value) + " ";
                            break;
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("Board fabricante: {0}", con));
            }      
        }

        /// <summary>
        /// Clase que permite obtener informacion del Mouse
        /// </summary>
        public class Mouse
        {
            /// <summary>
            /// Obtiene el tipo de periferico (marca y tipo(USB/PS2))
            /// </summary>
            /// <returns>tipo de mouse</returns>
            public static StringBuilder caption()
            {
                StringBuilder result = new StringBuilder();

                string con = string.Empty;
                using (ManagementClass management = new ManagementClass("Win32_PointingDevice"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["Caption"].Value) + " ";
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("Tipo de Mouse: {0}", con));
            }

            /// <summary>
            /// Obtiene el identificador de dispositivo
            /// </summary>
            /// <returns>identificador</returns>
            public static StringBuilder deviceID()
            {
                StringBuilder result = new StringBuilder();
                String con = string.Empty;
                using (ManagementClass management = new ManagementClass("Win32_PointingDevice"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["DeviceID"].Value) + " ";                            
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("Identificador de Mouse: {0}", con));
            }

            /// <summary>
            /// Fabricante del dispositivo
            /// </summary>
            /// <returns>fabricante del dispositivo</returns>
            public static StringBuilder manufacturer()
            {
                StringBuilder result = new StringBuilder();
                string con = string.Empty;

                using (ManagementClass management = new ManagementClass("Win32_PointingDevice"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["Manufacturer"].Value);                           
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("Fabricante: {0}", con));
            }
        }

        /// <summary>
        /// Clase que permite obtener informacion del monitor
        /// </summary>
        public class Monitor
        {
            /// <summary>
            /// Tipo de monitor de la PC
            /// </summary>
            /// <returns>tipo de monitor</returns>
            public static StringBuilder monitorType()
            {
                StringBuilder result = new StringBuilder();
                string con = string.Empty;
                using (ManagementClass management = new ManagementClass("Win32_DesktopMonitor"))
                {
                    //recorremos todas la instancias de la clase
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["MonitorType"].Value);                            
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("Tipo de Monitor: {0}", con));
            }

            /// <summary>
            /// Fabricante monitor
            /// </summary>
            /// <returns>fabricante de monitor</returns>
            public static StringBuilder monitorManufacturer()
            {
                StringBuilder result = new StringBuilder();
                string con = string.Empty;
                using (ManagementClass management = new ManagementClass("Win32_DesktopMonitor"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            con += Convert.ToString(item.Properties["MonitorManufacturer"].Value);
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result.Append(string.Format("Fabricante: {0}", con));
            }

            /// <summary>
            /// Obtiene un identificador unico para el dispositivo monitor
            /// </summary>
            /// <returns>obtiene el identificador monitor</returns>
            public static StringBuilder deviceID()
            {
                StringBuilder result = new StringBuilder();
                using (ManagementClass management = new ManagementClass("Win32_DesktopMonitor"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            result.Append(string.Format("Identificador de Monitor: {0}", Convert.ToString(item.Properties["PNPDeviceID"].Value)));
                            break;
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result;
            }
        }

        /// <summary>
        /// CLase que permite obtener informacion del board
        /// </summary>
        public class Cpu
        {
            /// <summary>
            /// Metodo que permite obtener el numero de serie de la cpu
            /// </summary>
            /// <returns>obtiene el identificador de Cpu</returns>
            public static StringBuilder serialNumber()
            {
                StringBuilder result = new StringBuilder();
                using (ManagementClass management = new ManagementClass("Win32_Processor"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            result.Append(string.Format("Identificador de Cpu: {0}", Convert.ToString(item.Properties["ProcessorId"].Value)));
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result;
            }

            /// <summary>
            /// Obtiene informacion de la cpu ejemplo Intel® Celeron® CPU N3050 @ 1.60GHz, Intel64 Family 6 Model 76 Stepping 3, SOCKET 0
            /// </summary>
            /// <returns>devuelve los detalles de la cpu</returns>
            public static StringBuilder getCpuDetails()
            {
                ManagementClass mc = new ManagementClass("win32_processor");
                ManagementObjectCollection moc = mc.GetInstances();

                String info = String.Empty;
                foreach (ManagementObject mo in moc)
                {
                    string name = (string)mo["Name"];
                    name = name.Replace("(TM)", "™").Replace("(tm)", "™").Replace("(R)", "®").Replace("(r)", "®").Replace("(C)", "©").Replace("(c)", "©").Replace("    ", " ").Replace("  ", " ");

                    info = name + ", " + (string)mo["Caption"] + ", " + (string)mo["SocketDesignation"];
                    break;
                }
                return new StringBuilder(string.Format("Detalles de Cpu: {0}", info));
            }

            /// <summary>
            /// Obtiene el fabricante de la CPU
            /// </summary>
            /// <returns>nombre de fabricante</returns>
            public static StringBuilder GetCPUManufacturer()
            {
                StringBuilder cpuMan = new StringBuilder();

                ManagementClass mgmt = new ManagementClass("Win32_Processor");
                ManagementObjectCollection objCol = mgmt.GetInstances();

                foreach (ManagementObject obj in objCol)
                {
                    try
                    {
                        cpuMan.Append(string.Format("Fabricante de la CPU: {0}", obj.Properties["Manufacturer"].Value.ToString()));
                    }
                    catch (Exception ex)
                    {
                        string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                        Console.WriteLine(error);
                    }
                }
                return cpuMan;
            }
        }

        /// <summary>
        /// Clase que permite obtener informacion del Sonido
        /// </summary>
        public class Sonido
        {
            /// <summary>
            /// Obtiene una descripcion del dispositivo de audio 
            /// </summary>
            /// <returns>informacion del dispositivo</returns>
            public static StringBuilder description()
            {
                StringBuilder result = new StringBuilder();
                using (ManagementClass management = new ManagementClass("Win32_SoundDevice"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            result.Append(string.Format("Descripcion de dispisitivo: {0}", Convert.ToString(item["description"])));
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result;
            }

            /// <summary>
            /// Fabricante del dispositivo
            /// </summary>
            /// <returns>fabricante</returns>
            public static StringBuilder manufacturer()
            {
                StringBuilder result = new StringBuilder();

                using (ManagementClass management = new ManagementClass("Win32_SoundDevice"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            result.Append(string.Format("Fabricante del dispositivo: {0}", Convert.ToString(item["Manufacturer"])));                          
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result;
            }

            /// <summary>
            /// Obtiene el ID del dispositivo (identificador unico para este dipositivo)
            /// </summary>
            /// <returns>identificador para este dispositivo</returns>
            public static StringBuilder deviceID()
            {
                StringBuilder result = new StringBuilder();

                using (ManagementClass management = new ManagementClass("Win32_SoundDevice"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            result.Append(string.Format("Identificador de dispositivo: {0}", Convert.ToString(item["DeviceID"])));
                            break;
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result;
            }
        }

        /// <summary>
        /// Clase que permite obtener informacion del teclado
        /// </summary>
        public class Teclado
        {
            /// <summary>
            /// Obtiene el identificador unico de teclado 
            /// </summary>
            /// <returns>identificador</returns>
            public static StringBuilder deviceID()
            {
                StringBuilder result = new StringBuilder();
                using (ManagementClass management = new ManagementClass("Win32_Keyboard"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            result.Append(string.Format("Identifcador de teclado: {0}", Convert.ToString(item["DeviceID"])));
                            break;
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result;
            }

            /// <summary>
            /// Obtiene una descripcion de teclado 
            /// </summary>
            /// <returns>descripcion</returns>
            public static StringBuilder description()
            {
                StringBuilder result = new StringBuilder();
                using (ManagementClass management = new ManagementClass("Win32_Keyboard"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            result.Append(string.Format("Descripcion de teclado: {0}", Convert.ToString(item["Description"])));
                            break;
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return result;
            }
        }

        /// <summary>
        /// Clase que permite obtener informacion del disco
        /// </summary>
        public class Disco
        {
            /// <summary>
            /// Muestra el modelo del disco duro (revisar)
            /// </summary>
            /// <returns>fabricante del disco duro</returns>
            public static List<string> model()
            {
                List<string> lista = new List<string>();
                using (ManagementClass management = new ManagementClass("Win32_DiskDrive"))
                {
                    foreach (ManagementObject item in management.GetInstances())
                    {
                        try
                        {
                            lista.Add(Convert.ToString(item["Model"]));
                        }
                        catch (Exception ex)
                        {
                            string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                            Console.WriteLine(error);
                        }
                    }
                }
                return lista;
            }

            /// <summary>
            /// Obtiene el numero de serie del disco duro (revisar)
            /// </summary>
            /// <returns>los numeros de series de ambos discos duros</returns>
            public static List<string> GetHDDSerialNo()
            {
                List<string> lista = new List<string>();
                try
                {
                    ManagementObjectSearcher dispositivo = new ManagementObjectSearcher("SELECT * FROM Win32_DiskDrive");
                    foreach (ManagementObject lector in dispositivo.Get())
                    {
                        if (!string.IsNullOrEmpty(Convert.ToString(lector["SerialNumber"])))
                        {
                            lista.Add(Convert.ToString(lector["SerialNumber"]));
                        }
                    }
                }
                catch (ManagementException ex)
                {
                    string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                    Console.WriteLine(error);
                }
                return lista;
            }
        }

        /// <summary>
        /// Obtiene informacion de la maquina
        /// </summary>
        public class Sistema
        {
            /// <summary>
            ///  Obtiene el nombre de la maquina
            /// </summary>
            /// <returns>el nombre fisico de la maquina</returns>
            public static StringBuilder GetComputerName()
            {
                StringBuilder result = new StringBuilder();

                ManagementClass mc = new ManagementClass("Win32_ComputerSystem");
                ManagementObjectCollection moc = mc.GetInstances();

                foreach (ManagementObject mo in moc)
                {
                    try
                    {
                        result.Append(string.Format("Nombre fisico de la maquina: {0}", (string)mo["Name"]));
                    }
                    catch (Exception ex)
                    {
                        string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                        Console.WriteLine(error);
                    }
                }
                return result;
            }

            /// <summary>
            /// Obtiene informacion del sistema operativo 
            /// </summary>
            /// <returns>infomacion referente al sistema operativo</returns>
            public static StringBuilder GetOSInformation()
            {
                StringBuilder result = new StringBuilder();
                ManagementObjectSearcher searcher = new ManagementObjectSearcher("SELECT * FROM Win32_OperatingSystem");
                foreach (ManagementObject wmi in searcher.Get())
                {
                    try
                    {
                        return result.Append(string.Format("Informacion del sistema operativo: {0}", (string)wmi["Caption"]).Trim() + ", " + (string)wmi["Version"] + ", " + (string)wmi["OSArchitecture"]);
                    }
                    catch (Exception ex)
                    {
                        string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                        Console.WriteLine(error);
                    }
                }
                return result;
            }

            /// <summary>
            /// devuelve el numero de licencia del sistema operativo
            /// </summary>
            /// <returns>numero del sistema</returns>
            public static StringBuilder serialNumber()
            {
                StringBuilder result = new StringBuilder();
                ManagementObjectSearcher searcher = new ManagementObjectSearcher("SELECT * FROM Win32_OperatingSystem");
                foreach (ManagementObject wmi in searcher.Get())
                {
                    try
                    {
                        return result.Append(string.Format("Numero de licencia del sistema operativo: {0}", (string)wmi["SerialNumber"]).Trim());
                    }
                    catch (Exception ex)
                    {
                        string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                        Console.WriteLine(error);
                    }
                }
                return result;
            }
        }

        /// <summary>
        /// Clase para obtener informacion de la MemoryRam 
        /// </summary>
        public class Memory
        {
            /// <summary>
            /// Medoto que obtiene la memoria fisica instalada en la PC 
            /// </summary>
            /// <returns>La ram de la maquina</returns>
            public static StringBuilder GetPhysicalMemory()
            {
                ManagementScope oMs = new ManagementScope();
                ObjectQuery oQuery = new ObjectQuery("SELECT Capacity FROM Win32_PhysicalMemory");

                ManagementObjectSearcher oSearcher = new ManagementObjectSearcher(oMs, oQuery);
                ManagementObjectCollection oCollection = oSearcher.Get();

                long MemSize = 0;
                long mCap = 0;

                // En caso de que haya mas de una memoria instalada
                foreach (ManagementObject obj in oCollection)
                {
                    mCap = Convert.ToInt64(obj["Capacity"]);
                    MemSize += mCap;
                }
                MemSize = (MemSize / 1024) / 1024;
                return new StringBuilder().Append(string.Format("Memory Ram: {0}", MemSize.ToString() + "MB"));
            }

            /// <summary>
            /// Obtiene la cantidad de slots
            /// </summary>
            /// <returns>Numero de slot</returns>
            public static StringBuilder GetNoRamSlots()
            {
                int MemSlots = 0;
                ManagementScope oMs = new ManagementScope();
                ObjectQuery oQuery2 = new ObjectQuery("SELECT MemoryDevices FROM Win32_PhysicalMemoryArray");

                ManagementObjectSearcher oSearcher2 = new ManagementObjectSearcher(oMs, oQuery2);
                ManagementObjectCollection oCollection2 = oSearcher2.Get();

                foreach (ManagementObject obj in oCollection2)
                {
                    MemSlots = Convert.ToInt32(obj["MemoryDevices"]);
                }
                return new StringBuilder().Append(string.Format("Numero de Slots de Ram: {0}", MemSlots.ToString()));
            }

            /// <summary>
            /// fabricante de la ram
            /// </summary>
            /// <returns>devuelve el fabricante de la ram</returns>
            public static List<string> manufacturer()
            {
                List<string> lista = new List<string>();
                object model = null;
                ManagementObjectSearcher searcher = new ManagementObjectSearcher("select * from Win32_PhysicalMemory");

                foreach (ManagementObject obj in searcher.Get())
                {
                    model = obj["Manufacturer"];
                    lista.Add(model.ToString().Trim());
                }
                return lista;
            }

            /// <summary>
            /// devuelve el numero serie de las memoryRam
            /// </summary>
            /// <returns>devuelve el numero de serie de la ram</returns>
            public static List<string> serialNumber()
            {
                List<string> lista = new List<string>();
                ManagementObjectSearcher searcher = new ManagementObjectSearcher("select * from Win32_PhysicalMemory");
                object serial = null;

                foreach (ManagementObject obj in searcher.Get())
                {
                    serial = obj["SerialNumber"];
                    lista.Add(serial.ToString().Trim());
                }
                return lista;
            }
        }

        /// <summary>
        /// Obtiene informacion del Bios
        /// </summary>
        public class Bios
        {
            /// <summary>
            /// Obtiene el numero de serie del bios (identificador unico que lo identifica)
            /// </summary>
            /// <returns>numero de serie del bios</returns>
            public static StringBuilder GetBIOSserNo()
            {
                StringBuilder result = new StringBuilder();
                ManagementObjectSearcher searcher = new ManagementObjectSearcher("root\\CIMV2", "SELECT * FROM Win32_BIOS");
                foreach (ManagementObject wmi in searcher.Get())
                {
                    try
                    {
                        result.Append(string.Format("SerialNumber: {0}", wmi.GetPropertyValue("SerialNumber").ToString()));
                        break;
                    }
                    catch (Exception ex)
                    {
                        string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                        Console.WriteLine(error);
                    }
                }
                return result;
            }

            /// <summary>
            /// Obtiene el fabricante del Bios
            /// </summary>
            /// <returns>el nombre de fabricante</returns>
            public static StringBuilder manufacturer()
            {
                StringBuilder result = new StringBuilder();
                try
                {
                    using (ManagementClass management = new ManagementClass("Win32_BIOS"))
                    {
                        foreach (ManagementObject item in management.GetInstances())
                        {
                            result.Append(string.Format("Fabricante: {0}", Convert.ToString(item.Properties["Manufacturer"].Value)));
                            break;
                        }
                    }
                }
                catch (Exception ex)
                {
                    string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                    Console.WriteLine(error);
                }
                return result;
            }

            /// <summary>
            /// Version del Bios
            /// </summary>
            /// <returns>el nombre del bios</returns>
            public static StringBuilder version()
            {
                StringBuilder result = new StringBuilder();
                try
                {
                    using (ManagementClass management = new ManagementClass("Win32_BIOS"))
                    {
                        foreach (ManagementObject item in management.GetInstances())
                        {
                            result.Append(string.Format("Version: {0}", Convert.ToString(item.Properties["Version"].Value)));
                            break;
                        }
                    }
                }
                catch (Exception ex)
                {
                    string error = string.Format("---\nSe ha producido el siguiente error:\n{0}\n---", ex.ToString());
                    Console.WriteLine(error);
                }
                return result;
            }
        }

        /// <summary>
        /// Clase que habilita el timer 
        /// </summary>
        public class TimerEnabled
        {
            /// <summary>
            /// metodo que permite hechar andar el timer
            /// </summary>
            public static void timerEnabled()
            {
                TimerCreate.enabled();
            }

            /// <summary>
            /// clase interna que crea el timer
            /// </summary>
            public class TimerCreate
            {
                static Timer myTimer = new Timer();

                private static void TimerEventProcessor(Object myObject,
                                                       EventArgs myEventArgs)
                {
                    myTimer.Enabled = true;
                    Console.WriteLine("Hola Mundo");
                }

                /// <summary>
                /// pone a correr el timer
                /// </summary>
                public static void enabled()
                {
                    //agrega este evento al event handler 
                    myTimer.Tick += new EventHandler(TimerEventProcessor);

                    //situa el timer a un intervalo de 5 segundos
                    myTimer.Interval = 5000;
                    myTimer.Start();

                    //corre el timer, y levanta el elemento
                    while (true)
                    {
                        //procesa todos los elementos en la cola de mensaje
                        Application.DoEvents();                                               
                    }
                }
            }
        }

        /// <summary>
        /// Clase que permite conectar con la base de Datos
        /// </summary>
        public class BaseDatos
        {
            /// <summary>
            /// propiedad 
            /// </summary>
            NpgsqlConnection conexion;

            /// <summary>
            /// metodo que permite conectar con la base de datos
            /// </summary>
            public void conectar()
            {
                NpgsqlConnectionStringBuilder aux = new NpgsqlConnectionStringBuilder();
                aux.Host = "127.0.0.1";
                aux.Port = 5432;
                aux.UserName = "postgres";
                aux.Password = "manuel";
                aux.Database = "hardware";
                conexion = new NpgsqlConnection(aux.ConnectionString);
            }

            /// <summary>
            /// Cierra la conexion a la base de datos
            /// </summary>
            public void close()
            {
                if (conexion.State == ConnectionState.Open) conexion.Close();
            }
        }

        /// <summary>
        /// Clase que permite ver las propiedades y metodos de las clases Win32_Classes
        /// para ver las propiedades y metodos de la clase ejemplo (Win32_BIOS) donde se crea 
        /// la clase ManagementClass poner (Win32_BIOS) asi podra ver propiedades y metodos
        /// </summary>
        public class View
        {
            public static void view()
            {
                // Obtiene la WMI class
                ManagementClass c =
                    new ManagementClass("Win32_CDROMDrive");

                // Obtien elos metodos de esta clase
                MethodDataCollection methods =
                    c.Methods;

                // muestra los metodos
                Console.WriteLine("Method Names: ");
                foreach (MethodData method in methods)
                {
                    Console.WriteLine(method.Name);
                }
                Console.WriteLine();

                // obtiene las propiedades de esta clase
                PropertyDataCollection properties =
                    c.Properties;

                // muestra las propiedades
                Console.WriteLine("Property Names: ");
                foreach (PropertyData property in properties)
                {
                    Console.WriteLine(property.Name);
                }
                Console.WriteLine();

                // Obtiene los calificadores de esta clase 
                QualifierDataCollection qualifiers =
                    c.Qualifiers;

                // muestra los calificadores
                Console.WriteLine("Qualifier Names:");
                foreach (QualifierData qualifier in qualifiers)
                {
                    Console.WriteLine(qualifier.Name);
                }
            }
        }
    }
}